## Browse Screen: Display rows only after searching

To display rows in a Browse Form only after a search is performed,

☛ Add this JavaScript Code to your form’s Custom Code field. 
❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif)
  
```javascript
if (nuFormType() == 'browse') {
   $('#nuSearchField').on('input change blur', function() {
       nuSetProperty('SEARCH_FIELD', this.value );   
  })
}
```


In the Browse SQL, add a WHERE clause. Rows are only displayed when the length of the search string is at least 2 characters.

```sql
WHERE LENGTH('#SEARCH_FIELD#') > 2 AND '#SEARCH_FIELD#' NOT LIKE '#%'
```


