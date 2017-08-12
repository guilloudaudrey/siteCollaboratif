function ChangeBackgroungImageOfTab(tabName, imagePrefix) {
    document.getElementById(tabName).style.backgroundImage = "url('images/" + imagePrefix + ".jpg')";

}

ChangeBackgroungImageOfTab("intro-header", "cover4");