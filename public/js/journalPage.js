console.log("journal page");

$(() => {
    $(".component-add-btn").on("click", function () {
        const component_index = get_component_index(this);

        console.log(component_index);
    });

    $(".component-up-btn").on("click", function () {
        const component_index = get_component_index(this);

        console.log(component_index);
    });

    $(".component-down-btn").on("click", function () {
        const component_index = get_component_index(this);

        console.log(component_index);
    });

    $(".component-add-above-btn").on("click", function () {
        const component_index = get_component_index(this);

        console.log(component_index);
    });

    $(".component-add-below-btn").on("click", function () {
        const component_index = get_component_index(this);

        console.log(component_index);
    });

    $(".component-delete-btn").on("click", function () {
        const component_index = get_component_index(this);

        console.log(component_index);
    });
});

function get_component_index(component) {
    return $(component).parent().parent().attr("data-component-number");
}
