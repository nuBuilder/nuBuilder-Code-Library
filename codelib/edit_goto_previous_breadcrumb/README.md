### Edit Screen: Return to another form after saving

After saving a record, you might want the user to take back to the previous Breadcrumb/Screen or any other (launch) form.

☛Add this JavaScript Code to your form’s Custom Code (Edit) field:

### Return to the previous Breadcrumb/Screen:

```javascript
function nuAfterSave() {
    nuOpenPreviousBreadcrumb();
}
```

### Return to a specific (launch) form:

```javascript
function nuAfterSave() {
    nuOpenPreviousBreadcrumb('nuuserhome');
}
```
