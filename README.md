# Packix DRM Middleman

Middleman is an in-between server for Packix's DRM API.

Use this in order to keep your Developer Access Key a secret. Preferably, use HTTPS if you are going to use it on your own server.

## Usage

If you're using DRMUtils, you can call import it into your tweaks.

```
#include ./DRMUtils.h
```

Make sure you've set up the macros in DRMUtils.m beforehand.

```
#define API_URL @"https://gmoran.me/api/YOUR_KEY.php"
#define PACKAGE_ID @"com.your.package"
```

Calling it is even easier.

```
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
```

## PHP Server 
Make sure you have php-curl installed on your server. It will not work otherwise.

If you are a tweak developer and would like to use this without hosting it yourself, please feel free to contact me on twitter: @fr0st or via email at gmorandotme@gmail.com

