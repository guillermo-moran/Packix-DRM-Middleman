# Packix DRM Middleman

Middleman is an in-between server for Packix's DRM API.

Use this in order to keep your Developer Access Key a secret. 
Please use HTTPS if you are going to use it on your own server.

## Usage

If you're using DRMUtils, you can call import it into your tweaks.

```objective-c
#include ./DRMUtils.h
```

Make sure you've set up the macros in DRMUtils.m beforehand.

```objective-c
#define API_URL @"https://gmoran.me/api/YOUR_KEY.php"
#define PACKAGE_ID @"com.your.package"
```

Calling it is even easier.

```objective-c
DRMUtils* drm = [[DRMUtils alloc] init];
int returnCode = [drm packageWasPurchased]; 

// Do whatever you will with the return code
if (returnCode == 0) {
  // Purchased!
}
else if (returnCode == 1) {
  // Pirated :(
}

else {
  // An error with the API Occured
}

// if you're not using arc, don't forget to manage your memory
[drm release];
```

## PHP Server 
Make sure you have php-curl installed on your server. It will not work otherwise.

If you are a tweak developer and would like to use this without hosting it yourself, please feel free to contact me on twitter: @fr0st or via email at gmorandotme@gmail.com

## Recommendation
If you are going to implement a DRM into your tweak, please be mindful of how it affects your regular users.

**Do Not have your tweak ping the DRM server everytime SpringBoard loads, or every time the user resprings, or everytime the device is unlocked. Do not do this every 10 minutes. If the server goes down, it negatively affects your users. And that's 100% guaranteed to get you on the front-page of the r/jailbreak subreddit. **

**And remember, chances are that your DRM *WILL BE CRACKED***

As @0ptimo once stated:

"There is no ready-made drop-in support for DRM, however, you may engineer your own solutions. If you have your own webserver and can manage writing routines for license checking, you can follow Cydia's API for checking the status of a device-identifier for purchase proof of your product. Understand clearly: if you wish to implement DRM you need to research and write your own solution, only checking through web-accessible API, the status of the license, from Cydia server. But, it must first go through your own server, so the Cydia Store endpoint server is protected from attackers. Each project and developer will have a different experience in these regards. If you want to beat crackers, you'll have to be as good as they are, unfortunately. We think that time might be better spent improving your product, because DRM that becomes cracked is an effort truly wasted"

