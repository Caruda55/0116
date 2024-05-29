// ==UserScript==
// @name         Bot for ya.ru
// @namespace    http://tampermonkey.net/
// @version      02
// @description  users bot
// @author       Buslaev Dmitry
// @match        https://ya.ru/*
// @icon         data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==
// @grant        none
// ==/UserScript==

(function() {
    'use strict';
    let input = document.getElementsByName("text")[0];
    let searchBtn = document.getElementsByClassName("search3__button mini-suggest__button")[0];
    let mainLogo = document.querySelector(".headline__logo");

    let keywords = ["Легковые автомобили в Москве", "Купить автомобиль", "Авто с пробегом"];
    let keyword = keywords[getRandom(0, keywords.length)];

    let links = document.links;

    if (mainLogo != null) {
        let i = 0;
        let timerID = setInterval(() => {
            input.value += keyword[i];
            i++;
            if (i == keyword.length) {
                clearInterval(timerID);
                searchBtn.click();
            }
        }, 100)


        } else if (location.hostname == "www.rolf.ru") {

            setInterval(() => {
                let index = getRandom(0, links.length);
                let link = links[index];

                if (getRandom(0, 101) >= 80) {
                    location.href = "https://ya.ru";
                }

                if (link.href.includes("www.rolf.ru")) {
                    link.click();
                }
            }, getRandom(2000, 3500))

            console.log("Мы на целевом сайте");
        } 
    else {
        let nextPage = true;
        for (let i = 0; i <= links.length; i++) {
            if (links[i].href.includes("https://www.rolf.ru/")) {
                let link2 = links[i];
                nextPage = false;
                console.log("Нашел строку " + link2);
                setTimeout(() => {
                    link2.click();
                }, getRandom(2500, 4000))
            }
        }



        if (document.querySelector(".Pager-ListItem").innerText == "4") {
            nextPage = false;
            location.href = "https://ya.ru/";
        }
        if(nextPage) {
            setTimeout(() => {
                document.querySelector(".Pager-Item_type_next").click();
            }, getRandom(4000, 4500))

        }
    }




    function getRandom(min, max) {
        return Math.floor(Math.random() * (max - min) + min);
    }

})();
