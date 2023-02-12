let del = document.getElementsByClassName("del");
console.log(del);
for(let s=0; s<del.length; s++) {
    let text = "Are you sure delete data ?"
    del[s].addEventListener("click", function() {
        if(confirm(text) == true) {
            document.cookie = "delete=true";
        } else {
            document.cookie = "delete=false";
        }
    });
}


// search_box = document.getElementById("search-box");
// search_box.addEventListener("keyup"||"click", function() {
//     let data_item = search_box.value;
//     console.log(data_item);
//     document.cookie = `data-item=${data_item}`;
// });

// let search_list = document.getElementById("search_list");
// function li() {
//     list_item = search_list.value;
//     document.cookie = `list-item=${list_item}`;
//     console.log(list_item);
// }
