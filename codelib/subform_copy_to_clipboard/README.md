### Subform: Copy data to clipboard

The function nuSubformToClipboard() will copy all data of a subform to the clipboard as tab-separated data (default), so you can easily paste the data into a spreadsheet (e.g. Excel) or elsewhere. 


```javascript
/**
 * Copy the data of a Subform to the Clipboard
 *
 * @param {string}  i                 - Subform Object ID
 * @param {string}  delimiter         - Delimiter for the data. Default: \t  (tabulator)
 * @param {bool}    [includeHeader]   - true to include the header (titles)
 * @param {bool}    [includeId]       - true to include the Id (Primary Key)
 *
 */

function nuSubformToClipboard(i, delimiter, includeHeader, includeId) {
```


#### ✪ Example

Add a button object to your form with an onclick event. Replace "subform_id" with your Subform Object ID.

```javascript
nuSubformToClipboard('subform_id', '\t');
```
