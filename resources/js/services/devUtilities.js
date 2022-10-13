export default {
    getValueFormUrlParams: function (param) {
        var url_string = window.location.href;
        var url = new URL(url_string);
        return url.searchParams.get(param);
    },

    getValueFromUrlPath: function (index) {
        var newURL = window.location.href.split("/");
        return newURL[index];
    },


}
