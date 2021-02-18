$(document).ready(function() {

    //desktop search
    $('#search,#m_search').keyup(function() {
        $('.d_search_result_block').show("fast");
        $(document).on('click', function(e) {
            if ($(e.target).closest(".d_search,.dropdown_search_content,.dropdown_search").length === 0) {
                $(".d_search_result_block,.dropdown_search_content").hide();
            }
        });
        var searchTxt = $(this).val();

        if (search !== null) {

            $.ajax({
                url: 'php/search.php',
                type: "POST",
                data: { search: searchTxt, type: 1 },
                dataType: 'json',
                success: function(data) {
                    var len = data.length;

                    $('.d_search_result,.m_search_result').empty();

                    for (var i = 0; i < len; i++) {
                        var id = data[i]['id'];
                        var fname = data[i]['fname'];
                        var lname = data[i]['lname'];

                        $('.d_search_result,.m_search_result').append("<li value='" + id + "'>" + fname + "&nbsp;" + lname + "</li>");
                    }

                    //binding click event to li
                    $('.d_search_result li,.m_search_result').bind('click', function() {
                        setText(this);
                    });
                }
            });
        } else $('.d_search_result,.m_search_result').empty();
    });
});

//set text to search box and get details

function setText(element) {
    var id = element.val();
    var name = element.text();

    $('#search,#m_search').val(value);
    $('.d_search_result,.m_search_result').empty();

    //Request user details 
    $.ajax({
        url: 'search.php',
        type: 'post',
        data: { id: id, type: 2 },
        dataType: 'json',
        success: function(data) {

            var len = data.length;
            // $('').empty();
            // if(len > 0){
            //do something using append
            // }
        }

    });
}