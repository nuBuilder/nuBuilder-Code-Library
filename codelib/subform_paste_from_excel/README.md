### Subform: Copy from Excel, Paste to a Subform

The function nuSubformEnableMultiPaste() allows you to copy data from Excel or a similar spreadsheet program and paste it into a nuBuilder subform.


<p align="left">
  <img src="screenshots/subform_paste_from_excel.gif">
</p>


#### ✪ Example

Call enableSubformMultiPaste() when the form is loaded.  Replace "subform_id" with your Subform Object ID.

☛Add this JavaScript Code to your form’s Custom Code field. 

❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif)

```javascript
	if (nuFormType() == 'edit') {
		nuSubformEnableMultiPaste("subform_id","input[type='text'],input[type='nuDate']");
	}
```

Setting up an undo Button:

Add a new Object of type Input/Button to your form with an onclick handler that calls nuSubformUndoPaste(this);
