### Edit Screen: Disable/Enable all Objects

The function nuDisableAllObjects() will disable all objects on a form. nuEnableAllObjects() will enable all objects.

Provide the optional arguments excludeTypes (array) to exclude certain object types or/and excludeIds (array) to exclude certain object Ids.


#### ✪ Example 1: Disable all objects
```javascript
nuDisableAllObjects();
```

#### ✪ Example 2: Enable all objects
```javascript
nuEnableAllObjects();
```

#### ✪ Example 3: Disable all objects but exclude some types.
```javascript
nuDisableAllObjects(['html', 'display', 'word']);
```

#### ✪ Example 4: Disable all objects but exclude the object with id "cus_name"
```javascript
nuDisableAllObjects([],['cus_name']);
```

#### ✪ Example 5: Disable all objects but not for globeadmin and the Access Level "manager"
```javascript
if (nuFormType() == 'edit') {
    var alc = nuAccessLevelCode();
    if (!window.global_access || !alc == 'manager') {
        nuDisableAllObjects();
    }
}
```
