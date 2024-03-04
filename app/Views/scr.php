<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    // "category_delete/(:any)/delete"
    const setstatus = (e) => {
        console.log(e.value);
        window.location = "<?php echo base_url() ?>" + `shopping/${e.value}`
    }
    const setmonth = (e) => {
        console.log(e.value)
        window.location = "<?php echo base_url() ?>" + `box?mth=${e.value}`
    }
    const deleteStuff = (id) => {
        fetch("<?php echo base_url() ?>" + `stuff/stuff_delete/${id}/delete`, {
                method: 'DELETE'
            })
            .then((res) => location.reload()).catch(err => console.log(err));
    }
    const deleteCategory = (id) => {
        fetch("<?php echo base_url() ?>" + `stuff/category_delete/${id}/delete`, {
                method: 'DELETE'
            })
            .then((res) => location.reload()).catch(err => console.log(err));
    }
    const deleteShop = (id) => {
        window.location = "<?php echo base_url() ?>" + `shops/${id}/delete`
    }
    const moveToBox = (id) => {
        fetch("<?php echo base_url() ?>" + `box_push/${id}`, {
            method: "POST"
        }).then(() => {
            alert("success")
        })
    }
    const deleteList = (id) => {
        console.log(id);
        fetch(`<?php echo base_url(); ?>delete_shopping_list/${id}`, {
            method: "DELETE"
        }).then(() => {
            // alert("success");
        })
    }
</script>
<script>
    const shopItems = document.querySelectorAll(".shop-item");
    const subLinkParent = document.querySelectorAll(".sub-link-parent");
    const selectShop = document.querySelectorAll(".select-shop");
    const selectStuff = document.querySelectorAll(".select-stuff");
    const selectCategory = document.querySelectorAll(".select-category");
    const sumStuff = document.querySelectorAll(".sum-stuff");
    const discountStuff = document.querySelectorAll(".discount-stuff");
    const totalPriceStuff = document.querySelectorAll(".total-price-stuff");
    const listItem = document.querySelectorAll(".lists-item");
    const shoppingListPrice = document.querySelectorAll(".shopping-list-price");
    const totalShopping = document.querySelectorAll(".total-shopping");
    const moneyHaveShopping = document.querySelectorAll(".money-have-shopping");
    const moneyLeftShopping = document.querySelectorAll(".money-left-shopping");
    shopItems.forEach(elem => {
        let id = elem.getAttribute("data-id");
        elem.onclick = () => {
            console.log(id);
            window.location = "<?php echo base_url() ?>" + `stuff/data_stuff/${id}`
        }
    })
    subLinkParent.forEach(elem => {
        elem.onmouseenter = () => {
            elem.firstElementChild.classList.toggle("show-sub-link")
        }
        elem.onmouseleave = () => {
            console.log("ASd")
            elem.firstElementChild.classList.toggle("show-sub-link")
        }
    });
    let price = 0;
    const rupiah = (number) => {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(number);
    }
    const setPrice = (num) => {
        return "Total price: " + rupiah(num)
    };
    selectShop.forEach((elem, idx) => {
        const selectStuffElem = selectStuff[idx];
        const discountStuffElem = discountStuff[idx];
        const sumStuffElem = sumStuff[idx];
        const totalPriceStuffElem = totalPriceStuff[idx];
        const selectCategoryElem = selectCategory[idx];
        let id_shop;
        let cateValue;
        const getItems = () => {
            cateValue = selectCategoryElem.value
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let a = JSON.parse(this.responseText);
                    if (selectCategoryElem.childElementCount <= 1) {
                        selectCategoryElem.innerHTML = `<option ${cateValue === "Choose a category" ? "selected":""}>Choose a category</option>`
                        // if (selectCategoryElem)
                        a["category"].forEach(x => {
                            const option = document.createElement("option");
                            option.setAttribute("value", x.id_category);
                            option.innerHTML = x.category_name;
                            if (cateValue === x.id_category) {
                                option.selected = true;
                            }
                            // console.log(option);
                            selectCategoryElem.appendChild(option);
                        });
                    }
                    selectStuffElem.innerHTML = '';
                    totalPriceStuffElem.value = 0;
                    if (a["stuff"].length > 0) {
                        let text = a["stuff"].map((x) => {
                            return (
                                `<option value="${x.id_stuff}" data-price="${x.price}">${x.stuff_name}</option>`
                            )
                        }).join("");
                        selectStuffElem.innerHTML = text;
                        price = selectStuffElem.firstElementChild.getAttribute("data-price");
                        sumStuffElem.value = 1;
                    } else {
                        sumStuffElem.value = 0;
                        price = "0";
                    }
                    totalPriceStuffElem.previousElementSibling.value = parseInt(price);
                    totalPriceStuffElem.value = parseInt(price);
                };
            };
            let query = `?shop=${id_shop}`;
            if (cateValue !== "Choose a category") {
                query += `&category=${cateValue}`
            }
            xmlhttp.open("GET", "<?php echo base_url() ?>" + `getItems${query}`, true);
            xmlhttp.send();
        }
        elem.onblur = (e) => {
            id_shop = e.target.value;
            getItems();
        };
        selectCategoryElem.onblur = (e) => {
            cateValue = e.target.value;
            getItems();
        };
        selectStuffElem.onblur = (e) => {
            for (let i = 0; i < selectStuffElem.childNodes.length; i++) {
                if (selectStuffElem.childNodes[i].value === e.target.value) {

                    price = selectStuffElem.childNodes[i].getAttribute("data-price");
                }
            }
            // totalPriceStuffElem.innerHTML = setPrice(price);
            totalPriceStuffElem.previousElementSibling.value = parseInt(price);
            totalPriceStuffElem.value = parseInt(price);
        };
        sumStuffElem.onblur = (e) => {
            // totalPriceStuffElem.innerHTML = setPrice(price * e.target.value);
            totalPriceStuffElem.previousElementSibling.value = parseInt(price * e.target.value);
            totalPriceStuffElem.value = parseInt(price * e.target.value);
        }
        discountStuffElem.onblur = (e) => {
            let discount = price - (price * e.target.value / 100) // https://onecompiler.com/posts/3tn9nx8cy/javascript-program-to-calculate-discount       
            totalPriceStuffElem.previousElementSibling.value = parseInt(discount);
            totalPriceStuffElem.value = parseInt(discount);
        }
    });
    const filterCategory = (x) => {
        console.log(x);
    };
    listItem.forEach((elem, idx) => {
        const id = elem.getAttribute("data-shopping-id");
        const shoppingListPriceElem = shoppingListPrice[idx];
        const totalShoppingElem = totalShopping[elem.getAttribute("data-index")];
        const moneyHaveShoppingElem = moneyHaveShopping[idx];
        const moneyLeftShoppingElem = moneyLeftShopping[idx];

        var xmlhttp = new XMLHttpRequest();
        let total;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let a = JSON.parse(this.responseText);
                let text = "";
                console.log(a);

                total = 0;
                let timeout = setTimeout(() => {
                    elem.innerHTML = text;
                    let leng = Object.keys(a["values"]).length;
                    if (leng > 0) {
                        text = Object.keys(a["values"]).map((prop, idx2) => {
                            return `
                            <li style="color:#034F84;" class="list-group-item text-center items-shop-name fw-bold">
                            ${prop}
                            </li>
                            <li class="list-group-item d-flex flex-column">
                                ${a["values"][prop].map((y, idx3) =>{
                                        total += parseInt(y.total_price);
                                        return `
                                                    <div data-id-item="${y.id_item_list}" class="d-flex justify-content-center align-items-center my-1 w-100">
                                                        <span class="me-1">
                                                            ${y.stuff_name} | ${rupiah(y.price)} x${y.sum} = ${rupiah(y.total_price)} 
                                                        </span>
                                                        <form method="post" action="<?php echo base_url() ?>itemsList_delete/${y.id_item_list}"> 
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button class="btn btn-danger btn-sm ms-2" type="submit">
                                                                <img src="<?php echo base_url() ?>assets/img/trash-fill.svg" width=14 height=14>
                                                            </button>
                                                        </form>
                                                    </div>`
                                }).join("")}
                            </li>
                            `
                        }).join("");
                    } else {
                        text = "<li class='list-group-item'>No item</li>";
                    }
                    elem.innerHTML = text;
                    shoppingListPriceElem.innerHTML = `Total: ${rupiah(total)}`;
                    totalShoppingElem.previousElementSibling.value = parseInt(total);
                    totalShoppingElem.value = parseInt(total);
                }, 900)
            };
            // <li class="list-group-item">An item</li>
        };
        elem.innerHTML = "<li class='list-group-item'>Loading..</ll>";
        xmlhttp.open("GET", "<?php echo base_url() ?>" + `getItemsList/${id}`, true);
        xmlhttp.send();
        moneyHaveShoppingElem.onblur = (x) => {
            let current = parseInt(x.target.value - total);
            moneyLeftShoppingElem.previousElementSibling.value = current;
            moneyLeftShoppingElem.value = current;
        }
    });
</script>
<script>
    const showLinkIcon = document.querySelectorAll(".show-link-icon");
    const subLinkMobile = document.querySelectorAll(".sub-link-mobile");
    const subLinkMobileItem = document.querySelectorAll(".sub-link-mobile-item");
    const hamburger = document.getElementById("hamburger");
    const linkMobile = document.querySelector(".link-mobile");
    hamburger.onclick = () => {
        linkMobile.classList.toggle("show-link-mobile");
        document.querySelector(".background-transparent").classList.toggle("show-background-transparent");
        // let right = linkMobile.style.right == "0" ? "-60%" : 0
        // let display = linkMobile.style.right == "0" ? "none" : "block"
        // linkMobile.style.right = right;
    }
    showLinkIcon.forEach((elem, idx) => {
        elem.onclick = () => {
            let height = subLinkMobileItem[idx].scrollHeight;
            console.log(height);
            for (let i = 0; i < subLinkMobile.length; i++) {
                if (i === idx) {
                    // subLinkMobile[i].classList.toggle("show-sub-link-mobile")
                    if (subLinkMobile[i].style.height === height + "px") {
                        subLinkMobile[i].style.height = 0 + "px";
                    } else {
                        subLinkMobile[i].style.height = height + "px";
                    }
                } else {
                    subLinkMobile[i].style.height = 0 + "px";
                    // if (subLinkMobile[i].classList.contains("show-sub-link-mobile")){
                    //     subLinkMobile[i].classList.toggle("show-sub-link-mobile")
                    // }
                }
            }
        }
    })
</script>