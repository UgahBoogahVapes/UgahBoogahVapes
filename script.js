let selectMenu = document.querySelector("category");
let heading = document.querySelector(".right h2");
let container = document.querySelector("category-wrapper");

selectMenu.addEventListener("change", function () {
    let categoryName = this.value;
    HTMLHeadingElement.innerHTML = this[this.selectedIndex].text;

    let http = new XMLHttpRequest();

    http.onload = function () {
        if (this.readyState == 4 && this.status == 200) {
            let response = JSON.parse(this.responseText);
            let out = "";
            for (let item of response) {
                out += `<div class="card mb-3" style="overflow: hidden;">
                <div class="card mb-3" style="overflow: hidden;">
                <div style="display: grid;	grid-template-columns: repeat(7, minmax(0, 1fr));">
                    <img style="height: 100%; width: 100%; object-fit: cover; aspect-ratio: 1/1; grid-column: span 2 / span 2;" src="./assets/img/places/'.($record['image'] ? explode(" %^&", $record['image'])[0] : "default.jpg" ).'" />
                    <div style="grid-column: span 4 / span 4; padding-top: 0.5em !important;">
                        <h4 style="padding-bottom: 0; font-size: 1.2em;" class="card-header">
                            '.$record['name'].'
                        </h4>
                        <div class="card-body">
                            <p style="font-size: 0.9em;">'.substr($record['description'], 0, 35).'...</p>
                            <h8 class="font-weight-bold" style="font-size: 0.7em;">'.$record['date'].'</h8>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-2" style="align-items: center;">
                        <button type="button" data-toggle="modal" data-target="#mapModal'.$record['id'].'" style="all:unset; margin: 1rem 0; width: 1.8em; height: 1.8em; border-radius: 5px; cursor: pointer;" class="d-flex justify-content-center align-items-center bg-warning">
                            <svg style="width: 1em; height: 1em; color: white;" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path d="M12 6H12.01M9 20L3 17V4L5 5M9 20L15 17M9 20V14M15 17L21 20V7L19 6M15 17V14M15 6.2C15 7.96731 13.5 9.4 12 11C10.5 9.4 9 7.96731 9 6.2C9 4.43269 10.3431 3 12 3C13.6569 3 15 4.43269 15 6.2Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
                      </div>`
            }
        }
    }









    http.open('POST', "category.php");
    http.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    http.send("category=" + categoryName);
});