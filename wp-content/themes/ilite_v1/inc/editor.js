
//Recent Posts Button
(function() {
   tinymce.create('tinymce.plugins.recentposts', {
      init : function(ed, url) {
         ed.addButton('recentposts', {
            title : 'Recent posts',
            image : url+'/recentpostsbutton.png',
            onclick : function() {
               var posts = prompt("Number of posts", "1");
               var text = prompt("List Heading", "This is the heading text");

               if (text != null && text != ''){
                  if (posts != null && posts != '')
                     ed.execCommand('mceInsertContent', false, '[recent-posts posts="'+posts+'"]'+text+'[/recent-posts]');
                  else
                     ed.execCommand('mceInsertContent', false, '[recent-posts]'+text+'[/recent-posts]');
               }
               else{
                  if (posts != null && posts != '')
                     ed.execCommand('mceInsertContent', false, '[recent-posts posts="'+posts+'"]');
                  else
                     ed.execCommand('mceInsertContent', false, '[recent-posts]');
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Recent Posts",
            author : 'Victor Lourng',
            authorurl : 'http://victorlourng.com',
            infourl : 'http://victorlourng.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('recentposts', tinymce.plugins.recentposts);
})();

//Button Button - haha get it
(function() {
   tinymce.create('tinymce.plugins.button', {
      init : function(ed, url) {
         ed.addButton('button', {
            title : 'Add Button',
            image : url+'/buttonbutton.png',
            onclick : function() {
               var type = prompt("Button Type (btn, primary, info, success, warning, danger, green, purple)", "btn");
               var url = prompt("Button Link", "http://");

               if (text != null && text != ''){
                  if (type != null && type != '')
                     ed.execCommand('mceInsertContent', false, '[button type="'+type+'"]'+text+'[/button]');
                  else
                     ed.execCommand('mceInsertContent', false, '[button]'+text+'[/button]');
               }
               else{
                  if (type != null && type != '')
                     ed.execCommand('mceInsertContent', false, '[button link="'+url+'"]');
                  else
                     ed.execCommand('mceInsertContent', false, '[button]');
               }
            }
         });
      },
      createControl : function(n, cm) {
         return null;
      },
      getInfo : function() {
         return {
            longname : "Button",
            author : 'Victor Lourng',
            authorurl : 'http://victorlourng.com',
            infourl : 'http://victorlourng.com',
            version : "1.0"
         };
      }
   });
   tinymce.PluginManager.add('button', tinymce.plugins.button);
})();

//Google Webfonts
  WebFontConfig = {
    google: { families: [ 'Ubuntu+Mono::latin'/*, 'Advent+Pro:400,700:latin', 'Open+Sans:400italic,700italic,400,700:latin'*/ ] }
  };
  (function() {
    var wf = document.createElement('script');
    wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
      '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
    wf.type = 'text/javascript';
    wf.async = 'true';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(wf, s);
  })();