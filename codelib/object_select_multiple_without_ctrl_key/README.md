## Select Object: Select multiple items without holding the Ctrl Key?

In order to select multiple items in a select object, you must Ctrl-Click items to add them. If you forget to hold down the Ctrl key when clicking an item, 
all the previously selected items are lost.

To prevent accidentally clearing your selections, use the nuSelectMultiWithoutCtrl() function. It allows you to select items without holding the Ctrl Key.


☛  Add the following JavaScript Code to your form’s Custom Code field. 

 ❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif)

```javascript

if (nuFormType() == 'edit') {
   nuSelectMultiWithoutCtrl()
}
```
