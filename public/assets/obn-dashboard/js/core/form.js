const getFormData = ($form) => {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};
    jQuery.map(unindexed_array, function (n, i) {
        indexed_array[n["name"]] = n["value"];
    });
    return indexed_array;
};