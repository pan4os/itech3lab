function getByVendor()
{
    var ajax = new XMLHttpRequest();

    var vendor = document.getElementById('vendor').value;

    ajax.onreadystatechange = function(){
        if(ajax.readyState === 4 && ajax.status ===200)
        {
            document.getElementById('tbody-vendor').innerHTML = ajax.responseText;
        }
    };
    ajax.open('GET',`vendor.php?vendor=${vendor}`);
    ajax.send();
}
function getByCategory(){
    var ajax = new XMLHttpRequest();

	var category = document.getElementById('category').value;

	ajax.onload = () => {
		let tbodyCategory = document.getElementById('tbody-category');
		tbodyCategory.innerHTML='';

		let xml = ajax.responseXML;

		if (xml == null)
			return;

		let names = xml.getElementsByTagName('name');
		let prices = xml.getElementsByTagName('price');
		let quantities = xml.getElementsByTagName('quantity');
		let qualities= xml.getElementsByTagName('quality');

		for (var i = 0; i < names.length; i++) {
			let tr = document.createElement('tr');

			let td = document.createElement('td');
			td.innerHTML = names[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = prices[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = quantities[i].textContent;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = qualities[i].textContent;
			tr.appendChild(td);

			tbodyCategory.appendChild(tr);
		}
	};

	ajax.open('GET', `category.php?category=${category}`);
	ajax.send();
}
function getByPrice() {
	var ajax = new XMLHttpRequest();

	var min = document.getElementById('min').value;
	var max = document.getElementById('max').value;

	ajax.onload = () => {
		let tbodyPrice = document.getElementById('tbody-price');
		tbodyPrice.innerHTML='';

		response = ajax.responseText;

		if (response == null)
			return;

		let items = JSON.parse(response);

		items.forEach(item => {
			let tr = document.createElement('tr');

			let td = document.createElement('td');
			td.innerHTML = item.name;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = item.price;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = item.quantity;
			tr.appendChild(td);

			td = document.createElement('td');
			td.innerHTML = item.quality;
			tr.appendChild(td);

			tbodyPrice.appendChild(tr);
		});
	};

	ajax.open('GET', `price.php?min=${min}&max=${max}`);
	ajax.send();
}