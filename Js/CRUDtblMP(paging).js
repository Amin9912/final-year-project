 // Global variables
var numDataShow = +document.getElementById("numDataShow");
var totData = +document.getElementById("totData").innerText;

var start = (currentPage - 1) * itemsPerPage;
var end = start + itemsPerPage;

var currentPage = 1;
var itemsPerPage = 10; // Number of items to show per page
var data; // Variable to store the retrieved data

numDataShow.innerHTML = itemsPerPage;

$(document).ready(function() {
  // Make an AJAX request to retrieve data
  $.ajax({
    url: 'retrieveProductData(CRUD).php',
    method: 'GET',
    dataType: 'json',
    success: function(response) {
      // Store the received data
      data = response;

      //console.log(data);

      // Process and display initial data page
      displayDataPage(currentPage);

      // Update pagination buttons
      updatePaginationButtons();

      // Handle click event for "Next" button
      $(".next").on("click", function() {
        if (currentPage < Math.ceil(data.length / itemsPerPage)) {
          currentPage++;
          displayDataPage(currentPage);
          updatePaginationButtons();
        }
      });

      // Handle click event for "Previous" button
      $(".prev").on("click", function() {
        if (currentPage > 1) {
          currentPage--;
          displayDataPage(currentPage);
          updatePaginationButtons();
        }
      });
    },
    error: function(xhr, status, error) {
      console.error(error);
    }
  });

  // Handle click event for "Next" button
  $(".next").on("click", function(e) {
    e.preventDefault();

            // Get the active page item
    var activeItem = $(".pagination .active");

            // Check if there is a next page item
    var nextPageItem = activeItem.next(".page-item");
    activeItem.removeClass("active");
    nextPageItem.addClass("active");

            // Enable or disable the "Previous" and "Next" buttons
    $(".prev").prop("disabled", !nextPageItem.prev(".page-item").length > 0);
    $(".next").prop("disabled", !nextPageItem.next(".page-item").length > 0);
  });

       // Handle click event for "Previous" button
  $(".prev").on("click", function(e) {
    e.preventDefault();

            // Get the active page item
    var activeItem = $(".pagination .active");

            // Check if there is a previous page item
    var prevPageItem = activeItem.prev(".page-item");
    activeItem.removeClass("active");
    prevPageItem.addClass("active");

            // Enable or disable the "Previous" and "Next" buttons
    $(".prev").prop("disabled", !prevPageItem.prev(".page-item").length > 0);
    $(".next").prop("disabled", !prevPageItem.next(".page-item").length > 0);
  });

});

// Function to process the received data and display a specific data page
function displayDataPage(page) {
  var table = $('#listproduct');
  // Clear previous table content
  table.empty();

  var startIndex = (page - 1) * itemsPerPage;
  var endIndex = startIndex + itemsPerPage;
  var dataPage = data.slice(startIndex, endIndex);

  // Populate table with data
  $.each(dataPage, function(index, row) {
    var tableRow = $('<tr>');

  // Increment the index for each row
    var i = startIndex + index;

  // Get the corresponding showData value for the current row
    var showData = showDataArray[i];

    var checkBox = "checkbox" + i;

  // Add an additional <td> element
    var additionalCell = $('<span class="custom-checkbox"><input type="checkbox" id="' + checkBox + '" name="options[]" value="' + showData + '"><label for="' + checkBox + '"></label></span>');

    tableRow.append(additionalCell);

    table.append(tableRow);

    $.each(row, function(key, value) {
      var tableCell = $('<td style="word-wrap: break-word; white-space: normal;">').text(value);
      tableRow.append(tableCell);
    });

  // Add an additional <td> element
    var additionalCell = $('<a href="#editEmployeeModal" class="edit" data-toggle="modal" data-edit-product="'+ showData +'" data-row-num="'+ i +'"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a><a href="#deleteEmployeeModal" class="delete" data-toggle="modal" data-delete-product="'+ showData +'"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>');

    tableRow.append(additionalCell);
  });

//Pop up window data show after click delete and edit icon

  $('.delete').click(function() {
    var showData = $(this).data('delete-product');
    $('input[name="prodID"]').val(showData);
  });

  $('.edit').click(function() {
    var showData = $(this).data('edit-product');
    var i = $(this).data('row-num');

    $('input[name="editPID"]').val(showData);
    $('input[name="editName"]').val(data[i]['productName']);
    $('input[name="editSize"]').val(data[i]['productSize']);
    $('select[name="editUnitSize"]').val(data[i]['unitSize']);
    $('input[name="editPrice"]').val(data[i]['productPrice']);
    $('textarea[name="editProductDescription"]').val(data[i]['productDescription']);
  });
}


// Function to update pagination buttons
function updatePaginationButtons() {

  // Enable or disable "Previous" button
  if (currentPage === 1) {
    $(".prev").prop("disabled", true);
  } else {
    $(".prev").prop("disabled", false);
  }

  // Enable or disable "Next" button
  if (currentPage === Math.ceil(data.length / itemsPerPage)) {
    $(".next").prop("disabled", true);
  } else {
    $(".next").prop("disabled", false);
  }
}