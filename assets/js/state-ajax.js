let countries = document.querySelector("#country");
countries.addEventListener("change", getRegionsCountry);

async function getRegionsCountry() {
    let country_id = countries.value;
    try{
        let response = await fetch("/country/region/" + country_id);
        let regions = await response.json();
        let selectRegion = document.querySelector("#region");
        selectRegion.innerHTML = "<option value=''>Not Selected</option>";
        for(const region of regions){
            let option = document.createElement("option");
            option.innerText = region.name;
            option.value = region.id;
            selectRegion.appendChild(option);
        }
        console.log(regions);
    }
    catch(error){
        console.error(error);
    }
}

// function getRegionsCountry() {
//     let country_id = countries.value;
    
//     $.ajax({ 
//         url: "/country/region/" + country_id, 
//         type: "GET", 
//         dataType: "json", 
//         success: function(regions){ 
//             const selectRegion = $("#region");
//             selectRegion.text("");
//             $("<option>").val("").text("Not select").appendTo(selectRegion);
//             for(const region of regions){
//                 $("<option>").val(region.id).text(region.name).appendTo(selectRegion);
//             }
//         }, 
//         error: function(xhr, status, error){ 
//             console.error(xhr.responseText); 
//         } 
//     });
// }
