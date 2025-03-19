### Hide/Resize a Column in a Browse Screen

This code snippet shows how to hide a column in a Browse Screen. 
Possible applications are, for example, if columns should not be displayed for certain access levels or if the object is displayed in an iFrame and you do not want to show one or more columns.

The function nuSetBrowseColumnSize(), as its name says, also allows to resize columns.

```javascript

 /*
 * Set the column size of a Browse Screen
 *
 * @param  {int}  column     - Column number (first column = 0, second column = 1 etc.)
 * @param  {int}  size       - Size in pixels
 */
function nuSetBrowseColumnSize(column, size) {

}
```


#### ✪ Example

☛ In you form's Custom Code, paste this JavaScript (❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif))

Hide the first column by setting its column width to 0.

```javascript
$(function () {
    nuSetBrowseColumnSize(0, 0);
});
```
