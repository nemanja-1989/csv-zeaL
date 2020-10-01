// console.log(1);
document.addEventListener("DOMContentLoaded", function() {
    // console.log(1);

    class HTTP {
        get(url) {
            return new Promise(function(resolve, reject) {
                fetch(url)
                .then(function(response) {
                return response.json();
                })
                .then(function(data) {
                    resolve(data);
                })
                .catch(function(error) {
                    reject(error);
                });
            });
            
        }
    }

    //GET MALE USERS
    document.querySelector("#get-male-users").addEventListener("click", getMaleUsers);
    function getMaleUsers(e) {

        // console.log(1);
        const getMaleUsers = new HTTP();
        getMaleUsers.get("http://127.0.0.1:8000/api/import-users")
            .then(function(data) {
                // console.log(data.male);
                const tbody = document.querySelector("#tbody-male");
                let output = '';
                data.male.forEach(function(value, key) {
                    output += `
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.first_name}</td>
                        <td>${value.last_name}</td>
                        <td>${value.gender}</td>
                        <td>${value.date_of_birth}</td>
                    </tr>
                    `;
                });
                tbody.innerHTML = output;
            })
            .then(function(error) {
                console.log(error);
            });
        
        e.preventDefault();
    }

    //GET FEMALE USERS
    document.querySelector("#get-female-users").addEventListener("click", getFemaleUsers);
    function getFemaleUsers(e) {

        // console.log(1);
        const getFemaleUsers = new HTTP();
        getFemaleUsers.get("http://127.0.0.1:8000/api/import-users")
            .then(function(data) {
                // console.log(data.male);
                const tbody = document.querySelector("#tbody-female");
                let output = '';
                data.female.forEach(function(value, key) {
                    output += `
                    <tr>
                        <td>${value.id}</td>
                        <td>${value.first_name}</td>
                        <td>${value.last_name}</td>
                        <td>${value.gender}</td>
                        <td>${value.date_of_birth}</td>
                    </tr>
                    `;
                });
                tbody.innerHTML = output;
            })
            .then(function(error) {
                console.log(error);
            });
        
        e.preventDefault();
    }
})