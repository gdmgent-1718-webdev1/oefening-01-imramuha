const AJAX = {
    getJSONByPromise(url) {
        return new Promise(function(resolve, reject) {
            var xhr = new XMLHttpRequest();
            xhr.responseType = 'json';
            xhr.open('GET', url, true);
            xhr.onload = function() {
                if(xhr.status === 200) {
                    var data = (!xhr.responseType)?JSON.parse(xhr.response):xhr.response;
                    resolve(data);
                } else {
                    reject(xhr.status);
                }
            };
            xhr.onerror = function() {
                reject(Error('Network Error!'));
            }
            xhr.send(null);
        })
    }
} 