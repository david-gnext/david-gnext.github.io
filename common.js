/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function time() {
// setTimeout(function() {
//        location.href = "finish.php";
//    }, 30*60*1000);
//    setInterval(function() {
//       var j = new Date();
//       var hr = j.getHours();
//       var min = j.getMinutes();
//       var sec = j.getSeconds();
//       document.getElementById('time').innerHTML = hr + ":" + min + ":" + sec;
//    }, 1000);
//     var time = 60 * 1;  //Replace 1 with 30 minutes
//    var minutes, seconds;
//    setInterval(function () {
//      minutes = parseInt(time / 60)
//      seconds = parseInt(time % 60);
//
//      minutes = minutes < 10 ? "0" + minutes : minutes;
//      seconds = seconds < 10 ? "0" + seconds : seconds;
//
//      document.getElementById('time').innerHTML = minutes + ":" + seconds;
//       
//      time--;
//      
//      if (time < 0) {
//        location.href = "finish.php";
//      }
//    }, 1000); 
}
//var x,h,s,m;


//        var contactsService;
//        function setupContactsService() {
//        contactsService = new google.gdata.contacts.ContactsService('Gcontact');
//                }
//
//function logMeIn() {
//var scope = 'https://www.google.com/m8/feeds';
//        var token = google.accounts.user.login(scope);
//        }
//
//function initFunc() {
//setupContactsService();
//        logMeIn();
//        getMyContacts();
//        }
//function logMeOut() {
//google.accounts.user.logout();
//        }
//
//function getMyContacts() {
//var contactsFeedUri = 'https://www.google.com/m8/feeds/contacts/default/full';
//        var query = new google.gdata.contacts.ContactQuery(contactsFeedUri);
//        // Set the maximum of the result set to be 5
//        query.setMaxResults(5);
//        contactsService.getContactFeed(query, handleContactsFeed, handleError);
//        }
//
//var handleContactsFeed = function(result) {
//var entries = result.feed.entry;
//        for (var i = 0; i < entries.length; i++) {
//var contactEntry = entries[i];
//        var emailAddresses = contactEntry.getEmailAddresses();
//        for (var j = 0; j < emailAddresses.length; j++) {
//var emailAddress = emailAddresses[j].getAddress();
//        console.log('email = ' + emailAddress);
//}
//}
//}
//function handleError(e) {
//alert("There was an error!");
//        alert(e.cause ? e.cause.statusText : e.message);
//        }

        function auth() {
    var config = {
        'client_id': '1061289256628-i803rhcdn0f59jejhgvrn2km33cql87r.apps.googleusercontent.com',
        'scope': 'https://www.google.com/m8/feeds'
    };
    gapi.auth.authorize(config, function () {
        fetch(gapi.auth.getToken());

    });
}

function fetch(token) {
    $.getJSON('https://www.google.com/m8/feeds/contacts/default/full/?access_token=' +
            token.access_token + "&alt=json&callback=?", function (result) {
                var data = result.feed.entry;
                for(var i in data){
                    console.log(data[i].title.$t);
                    console.log(typeof data[i].gd$email === "undefined" ? '':data[i].gd$email[0].address);
                }
            });
        }
        