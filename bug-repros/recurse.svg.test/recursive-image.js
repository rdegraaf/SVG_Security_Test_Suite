var http = require('http');

var svg = '<?xml version="1.0" encoding="UTF-8" standalone="no"?>\
<svg\
   xmlns="http://www.w3.org/2000/svg"\
   xmlns:xlink="http://www.w3.org/1999/xlink"\
   width="68"\
   height="68"\
   viewBox="-34 -34 68 68"\
   version="1.1">\
  <circle\
     cx="0"\
     cy="0"\
     r="24"\
     fill="#c8c8c8"/>\
  <image x="34" y="34" width="34" height="34" xlink:href="REPLACE" />\
</svg> '

http.createServer(function(request, response) {
    var num = parseInt(request.url.substr(1))
    if (isNaN(num) && "GET" == request.method) {
        response.writeHead(400, {'Content-Type': 'text/plain'});
        if ("GET" == request.method) {
            console.log("Unrecognized request for " + request.url);
            response.end("The request should be an integer.  Try '0'.");
        } else {
            response.end();
        }
    } else {
        response.writeHead(200, {'Content-Type': 'image/svg+xml'});
        if ("GET" == request.method) {
            console.log(num);
            response.end(svg.replace("REPLACE", ""+(num+1)));
        } else {
            response.end();
        }
    }
}).listen(8000);

