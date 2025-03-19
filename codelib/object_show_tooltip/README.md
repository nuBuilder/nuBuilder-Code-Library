### Object: Show a tooltip on hover 

A tooltip is often used to specify extra information about something when the user moves the mouse pointer over an object. Use the function nuSetToolTip() to show a tooltip for an object.

<p align="left">
  <img src="screenshots/show_tooltip.gif">
</p>

#### ✪ Example

☛ Add this JavaScript Code to your form’s Custom Code field:

❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif)


```javascript
if (nuFormType() == 'edit') {
  // if the 3rd parameter is true: Show the tooltip also on label hover
  nuSetToolTip("my_object_id", "Show some additional information!", true);
}  
```

