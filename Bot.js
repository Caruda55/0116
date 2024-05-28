// ==UserScript==
// @name         Bot for ya.ru
// @namespace    http://tampermonkey.net/
// @version      2024-05-28
// @description  users bot
// @author       Buslaev Dmitry
// @match        https://ya.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

(function() {
    let input = document.getElementsByName("text")[0]
    let searchBtn = document.getElementsByClassName("search3__button mini-suggest__button")[0];

    let keywords = ["Легковые автомобили в Москве", "Купить автомобиль", "Авто с пробегом", "Новые авто"];
    let keyword = keywords[getRandom(0, keywords.length)];
    let links = document.links;



    if (input.value = keyword) {
        searchBtn.click();

        for (let i = 0; i < links.length; i++) {
            if (links[i].href.includes("https://auto.ru/")) {
                let link = links[i];
                console.log("Found " + link);
                link.click();
            }
        }
    }

    function getRandom(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
    }

})();
