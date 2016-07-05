// var text = "HELLO THERE"; 
// $("#sharing").jsSocials({=
//   shareIn: "popup",
//   shareUrl: "https://twitter.com/share?url={url}&text={text}&via={via}&hashtags={hashtags}",
//   countUrl: "https://cdn.api.twitter.com/1/urls/count.json?url={url}&callback=?",
//   shares: ["twitter", "facebook", "googleplus", "linkedin"],
//   getCount: function(data) {
//     return data.count;
//   }
// });
if($('body#news-page')){
  $(".social-sharing").jsSocials({
    shareIn: "popup",
    url: "http://bpn.conraddavisjr.com/news",
    text: "BPN NEWS",
    showLabel: false,
    shares: [
      { share: "twitter", logo: "fa fa-twitter", via: "artem_tabalin", hashtags: "search,google" },
      "facebook",
      "googleplus",
      "linkedin"
    ]
  });
}else{
  $(".social-sharing").jsSocials({
    shareIn: "popup",
    url: "http://bpn.conraddavisjr.com/events",
    text: "BPN EVENTS",
    showLabel: false,
    shares: [
      { share: "twitter", logo: "fa fa-twitter", via: "artem_tabalin", hashtags: "search,google" },
      "facebook",
      "googleplus",
      "linkedin"
    ]
  });
}


// $("#shareIconsCount").jsSocials({
//     url: "http://www.google.com",
//     text: "Google Search Page",
//     showCount: true,
//     showLabel: false,
//     shares: [
//         { share: "twitter", via: "artem_tabalin", hashtags: "search,google" },
//         "facebook",
//         "googleplus",
//         "linkedin",
//         "pinterest",
//         "stumbleupon",
//         "whatsapp"
//     ]
// });