chrome.browserAction.onClicked.addListener(function(tab) {
  var newURL = "https://photos.google.com/people";
  chrome.tabs.create({ url: newURL });
});
