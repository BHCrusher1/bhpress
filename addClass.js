jQuery(function ($) {
    $(".entry-content table").addClass("table");
    $(".more-link, .read-more").addClass("btn btn-info my-3");
    $(".cat-links a").addClass("text-white");
    $("#secondary section").addClass("mb-3");
    $("#secondary section").children("*").not("div").addClass("container");
    $("#secondary section ul").addClass("list-group list-group-flush p-0");
    $("#secondary section li").addClass("list-group-item");
    $("ul.page-numbers").addClass("pagination mb-0");
    $("ul.page-numbers li").addClass("px-3");
    $("#comments .form-submit #submit").addClass("btn btn-outline-primary");
    $("#comments input[type=\"text\"], #comments input[type=\"email\"], #comments input[type=\"url\"], #comments textarea").addClass("form-control");
});
