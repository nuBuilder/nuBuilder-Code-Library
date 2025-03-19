### Positioning labels above objects

Use the function nuLabelOnTop() to place a Label on top of its object.
This is especially useful when the caption gets a little longer and it would take up too much space horizontally.

<p align="left">
  <img src="screenshots/labels_on_top.gif">
</p>


☛</strong>  Add the JavaScript to your form’s Custom Code field</p>

❓ [How to add Custom Code](/codelib/common/form_add_custom_code_javascript.gif)

#### ✪ Example 1: 

Position all labels at top of their objects:

```javascript
if (nuFormType() == 'edit') {
    nuLabelOnTop();
}
```

#### ✪ Example 2</strong>: 
  
Position all labels above their objects, but exclude some:

```javascript
if (nuFormType() == 'edit') {
    var f = nuSubformObject("").fields;          // include all objects of your form
    var e = ["cus_firstname", "cus_lastname"];   // but exclude these two objects
    nuLabelOnTop(f, e);
}
```

#### ✪ Example 3: 

Position the labels of some objects above their objects:

```javascript
if (nuFormType() == 'edit') {
    var f = ["cus_firstname", "cus_lastname"];   // include just these two objects
    nuLabelOnTop(f, []);
}
```

#### ✪ Example 4: 

Position the labels of all objects at the top of their objects:

```javascript
if (nuFormType() == 'edit') {
    $('input').nuLabelOnTop();
}
```

#### ✪ Example 5: 

Position all labels of the subform with ID subfromObjID at the top of their objects:
(Do not forget to do the positioning again when a new subform row is added. Use the afterinsertrow event of the subform.)


```javascript
if (nuFormType() == 'edit') {
    $('[id^=subfromObjID]).nuLabelOnTop();
}
```

#### ✪ Example 6: 

Position the label of the Object with ID "firstname" in the subform with ID subfromObjID at the top of its object:

```javascript
if (nuFormType() == 'edit') {
	$('[id^=subfromObjID][id$=firstname]').nuLabelOnTop();
}
```
