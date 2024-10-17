let countries = document.querySelector('#school-country_id');
countries.addEventListener('change', selectCountry);
function selectCountry(){
    let country_id = countries.value;
    location.href = "/school/create?country_id=" + country_id;
}
