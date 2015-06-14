window.navViews = [];

// Data for all Navs
var NavigationCollection = Backbone.Collection.extend({
  url: '/api/nav'
});

// var NavView = Backbone.View.extend({

// });

var NavigationView = Backbone.View.extend({
  // tagName: 'nav',
  // className: 'nav',
  // events: {
  //   'click a': 'open'
  // },
  template: _.template($('.navigation-view').html()),

  initialize: function() {
    var self = this;

    self.listenTo(self.model, 'change', self.render);
  },

  render: function() {
    var self = this;

    self.id = self.model.get('title').toLowerCase().replace(/ /, '-');
    self.setElement($('#'+self.id));

    self.$el.html(self.template(self.model.attributes));

    return self;
  }
});



var navs = new NavigationCollection();

navs.on('add', function(nav){
  nav.fetch();
  window.navViews.push(new NavigationView({
    model: nav,
    // id: nav.get('title').toLowercase().replace(/ /, '_')
  }));
});

navs.add([{id: 'main.json'}, {id: 'subnav.json'}]);




// var titles = books.map(function(book) {
//   return book.get("title");
// });