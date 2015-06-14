// Data for all Navs
var NavigationCollection = Backbone.Collection.extend({
  url: '/api/nav'
});

// View for each <nav>
var NavigationView = Backbone.View.extend({
  template: _.template($('.navigation-view').html()),

  initialize: function() {
    var self = this;

    self.listenTo(self.model, 'change', self.render);
  },

  render: function() {
    var self = this,
        model = self.model;

    self.id = model.get('title').toLowerCase().replace(/ /, '-');
    self.setElement($('#'+self.id));

    self.$el.html(self.template(model.attributes));

    // return self;
  }
});

// Data for all Headlines
var HeadlinesCollection = Backbone.Collection.extend({
  url: '/api/headlines'
});

// View for each Headline
var headlineView = Backbone.View.extend({
  tagName: "li",
  template: _.template($('.headline-view').html()),

  initialize: function() {
    var self = this;

    self.listenTo(self.model, 'change', self.render);
  },

  render: function() {
    var self = this,
        model = self.model;

    model.set('teaser', self.truncate(model.get('content')));
    self.$el.html(self.template(model.attributes));

    $('.headlines').append(self.$el); // need to check for dupes and possibly filter based on keywords

    // return self;
  },

  // Todo
  truncate: function(html) {
    return html;
  }
});


// NAVIGATION
var navs = new NavigationCollection();

navs.on('add', function(nav){
  nav.fetch();
  new NavigationView({
    model: nav
  });
});

navs.add([{id: 'main.json'}, {id: 'subnav.json'}]); // navs.fetch()

// HEADLINES
var headlines = new HeadlinesCollection();

headlines.on('add', function(headline){
  headline.fetch();
  new headlineView({
    model: headline
  });

  // $('.headlines').append();
});

headlines.add([{id: 'headline1.json'}, {id: 'headline2.json'}]); // headlines.fetch()
