## Browse Screen: Refresh after a given period of inactivity

This code can be used to refresh a Browse Screen after a given period of time unless the user recently (e.g. last 10 seconds) pressed a key or moved the mouse.


☛ Add this JavaScript Code to your form’s Custom Code (Browse) field. 
❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif)
  
```javascript
var intervalID = null;

var time = new Date().getTime();
$(document).on("mousemove.browserefresh keypress.browserefresh", function(e) {
    time = new Date().getTime();
});

function refreshBrowse(formId, period) {

    if (nuGetProperty('form_id') !== formId || nuFormType() !== 'browse') {
        clearInterval(intervalID);
        $(document).off("mousemove.browserefresh keypress.browserefresh");
    } else if (new Date().getTime() - time >= period) {
        time = new Date().getTime();
        nuGetBreadcrumb();
    }
}

intervalID = setInterval(() => refreshBrowse('61c9aaa83024575', 10000), 1000);
```

☛ Replace '61c9aaa83024575' with your Form Id.

☛ 10000 (10 seconds) is the period of inactivity
