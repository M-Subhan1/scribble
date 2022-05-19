const turndown_service = new TurndownService({
    headingStyle: "atx",
});
const showdown_converter = new showdown.Converter();

$(() => {
    add_event_listeners();
});

function add_event_listeners() {
    $(".component-add-btn").on("click", add_component);
    $(".component-up-btn").on("click", move_component_up);
    $(".component-down-btn").on("click", move_component_down);
    $(".component-add-above-btn").on("click", add_component_above);
    $(".component-add-below-btn").on("click", add_component_below);
    $(".component-delete-btn").on("click", delete_component);
    $(".component .content").on("focus", on_focus);
    $(".component .content").on("blur", on_blur);
    $("#save-btn").on("click", save_page);
}

function remove_event_listeners() {
    $(".component-add-btn").off("click", add_component_above);
    $(".component-up-btn").off("click", move_component_up);
    $(".component-down-btn").off("click", move_component_down);
    $(".component-add-above-btn").off("click", add_component_above);
    $(".component-add-below-btn").off("click", add_component_below);
    $(".component-delete-btn").off("click", delete_component);
    $(".component .content").off("input", on_change);
}

function add_component() {
    const component = $(this).closest(".component");
    component.after(component.clone(true, true));
}

function add_component_above() {
    const component = $(this).closest(".component");
    const new_component = component.clone(true, true);

    new_component.find(".content").empty();
    component.before(new_component);
}

function add_component_below() {
    const component = $(this).closest(".component");
    const new_component = component.clone(true, true);

    new_component.find(".content").empty();
    component.after(new_component);
}

function move_component_up() {
    const component = $(this).closest(".component");
    const components = $(".component");
    const component_index = components.index(component);
    const component_prev = $(components.get(component_index - 1));

    if (component_index == 0) return;

    component.after(component_prev.clone(true, true));
    component_prev.remove();
}

function move_component_down() {
    const component = $(this).closest(".component");
    const components = $(".component");
    const component_index = components.index(component);
    const component_next = $(components.get(component_index + 1));

    if (component == components.last) return;

    component.before(component_next.clone(true, true));
    component_next.remove();
}

function delete_component() {
    $(this).closest(".component").remove();
}
// Utility Functions
function create_component() {
    const component = document.createElement("div.component.bg-white");
    component.innerHTML(`<div class="bg-white component" data-component-number={{ $component['number'] }}>
        <div class="content" contenteditable="true">

        </div>
        <div class="menu">
            <span class="component-add-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                    fill="none" data-icon="ui-components:duplicate">
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3" fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M2.79998 0.875H8.89582C9.20061 0.875 9.44998 1.13914 9.44998 1.46198C9.44998 1.78482 9.20061 2.04896 8.89582 2.04896H3.35415C3.04936 2.04896 2.79998 2.3131 2.79998 2.63594V9.67969C2.79998 10.0025 2.55061 10.2667 2.24582 10.2667C1.94103 10.2667 1.69165 10.0025 1.69165 9.67969V2.04896C1.69165 1.40328 2.1904 0.875 2.79998 0.875ZM5.36665 11.9V4.55H11.0833V11.9H5.36665ZM4.14165 4.14167C4.14165 3.69063 4.50728 3.325 4.95832 3.325H11.4917C11.9427 3.325 12.3083 3.69063 12.3083 4.14167V12.3083C12.3083 12.7594 11.9427 13.125 11.4917 13.125H4.95832C4.50728 13.125 4.14165 12.7594 4.14165 12.3083V4.14167Z"
                        fill="#616161"></path>
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3"
                        d="M9.43574 8.26507H8.36431V9.3365C8.36431 9.45435 8.26788 9.55078 8.15002 9.55078C8.03217 9.55078 7.93574 9.45435 7.93574 9.3365V8.26507H6.86431C6.74645 8.26507 6.65002 8.16864 6.65002 8.05078C6.65002 7.93292 6.74645 7.8365 6.86431 7.8365H7.93574V6.76507C7.93574 6.64721 8.03217 6.55078 8.15002 6.55078C8.26788 6.55078 8.36431 6.64721 8.36431 6.76507V7.8365H9.43574C9.5536 7.8365 9.65002 7.93292 9.65002 8.05078C9.65002 8.16864 9.5536 8.26507 9.43574 8.26507Z"
                        fill="#616161" stroke="#616161" stroke-width="0.5"></path>
                </svg>
            </span>
            <span class="component-up-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                    fill="none" data-icon="ui-components:move-up">
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3"
                        d="M1.52899 6.47101C1.23684 6.76316 1.23684 7.23684 1.52899 7.52899V7.52899C1.82095 7.82095 2.29426 7.82116 2.58649 7.52946L6.25 3.8725V12.25C6.25 12.6642 6.58579 13 7 13V13C7.41421 13 7.75 12.6642 7.75 12.25V3.8725L11.4027 7.53178C11.6966 7.82619 12.1736 7.82641 12.4677 7.53226V7.53226C12.7617 7.2383 12.7617 6.7617 12.4677 6.46774L7.70711 1.70711C7.31658 1.31658 6.68342 1.31658 6.29289 1.70711L1.52899 6.47101Z"
                        fill="#616161"></path>
                </svg>
            </span>
            <span class="component-down-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                    fill="none" data-icon="ui-components:move-down">
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3"
                        d="M12.471 7.52899C12.7632 7.23684 12.7632 6.76316 12.471 6.47101V6.47101C12.179 6.17905 11.7057 6.17884 11.4135 6.47054L7.75 10.1275V1.75C7.75 1.33579 7.41421 1 7 1V1C6.58579 1 6.25 1.33579 6.25 1.75V10.1275L2.59726 6.46822C2.30338 6.17381 1.82641 6.17359 1.53226 6.46774V6.46774C1.2383 6.7617 1.2383 7.2383 1.53226 7.53226L6.29289 12.2929C6.68342 12.6834 7.31658 12.6834 7.70711 12.2929L12.471 7.52899Z"
                        fill="#616161"></path>
                </svg>
            </span>
            <span class="component-add-above-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                    fill="none" data-icon="ui-components:add-above">
                    <g xmlns="http://www.w3.org/2000/svg" clip-path="url(#clip0_137_19492)">
                        <path class="jp-icon3"
                            d="M4.75 4.93066H6.625V6.80566C6.625 7.01191 6.79375 7.18066 7 7.18066C7.20625 7.18066 7.375 7.01191 7.375 6.80566V4.93066H9.25C9.45625 4.93066 9.625 4.76191 9.625 4.55566C9.625 4.34941 9.45625 4.18066 9.25 4.18066H7.375V2.30566C7.375 2.09941 7.20625 1.93066 7 1.93066C6.79375 1.93066 6.625 2.09941 6.625 2.30566V4.18066H4.75C4.54375 4.18066 4.375 4.34941 4.375 4.55566C4.375 4.76191 4.54375 4.93066 4.75 4.93066Z"
                            fill="#616161" stroke="#616161" stroke-width="0.7"></path>
                    </g>
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3" fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M11.5 9.5V11.5L2.5 11.5V9.5L11.5 9.5ZM12 8C12.5523 8 13 8.44772 13 9V12C13 12.5523 12.5523 13 12 13L2 13C1.44772 13 1 12.5523 1 12V9C1 8.44772 1.44771 8 2 8L12 8Z"
                        fill="#616161"></path>
                    <defs xmlns="http://www.w3.org/2000/svg">
                        <clipPath id="clip0_137_19492">
                            <rect class="jp-icon3" width="6" height="6" fill="white"
                                transform="matrix(-1 0 0 1 10 1.55566)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span class="component-add-below-btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                    fill="none" data-icon="ui-components:add-below">
                    <g xmlns="http://www.w3.org/2000/svg" clip-path="url(#clip0_137_19498)">
                        <path class="jp-icon3"
                            d="M9.25 10.0693L7.375 10.0693L7.375 8.19434C7.375 7.98809 7.20625 7.81934 7 7.81934C6.79375 7.81934 6.625 7.98809 6.625 8.19434L6.625 10.0693L4.75 10.0693C4.54375 10.0693 4.375 10.2381 4.375 10.4443C4.375 10.6506 4.54375 10.8193 4.75 10.8193L6.625 10.8193L6.625 12.6943C6.625 12.9006 6.79375 13.0693 7 13.0693C7.20625 13.0693 7.375 12.9006 7.375 12.6943L7.375 10.8193L9.25 10.8193C9.45625 10.8193 9.625 10.6506 9.625 10.4443C9.625 10.2381 9.45625 10.0693 9.25 10.0693Z"
                            fill="#616161" stroke="#616161" stroke-width="0.7"></path>
                    </g>
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3" fill-rule="evenodd"
                        clip-rule="evenodd"
                        d="M2.5 5.5L2.5 3.5L11.5 3.5L11.5 5.5L2.5 5.5ZM2 7C1.44772 7 1 6.55228 1 6L1 3C1 2.44772 1.44772 2 2 2L12 2C12.5523 2 13 2.44772 13 3L13 6C13 6.55229 12.5523 7 12 7L2 7Z"
                        fill="#616161"></path>
                    <defs xmlns="http://www.w3.org/2000/svg">
                        <clipPath id="clip0_137_19498">
                            <rect class="jp-icon3" width="6" height="6" fill="white"
                                transform="matrix(1 1.74846e-07 1.74846e-07 -1 4 13.4443)"></rect>
                        </clipPath>
                    </defs>
                </svg>
            </span>
            <span class="component-delete-btn">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="16px" height="16px"
                    data-icon="ui-components:delete">
                    <path xmlns="http://www.w3.org/2000/svg" d="M0 0h24v24H0z" fill="none"></path>
                    <path xmlns="http://www.w3.org/2000/svg" class="jp-icon3" fill="#626262"
                        d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z">
                    </path>
                </svg>
            </span>
        </div>
    </div>`);

    return component;
}

function on_focus() {
    const content = $(this);
    const markdown = turndown_service.turndown(content.html());
    console.log(markdown);
    content.html(markdown);
}

function on_blur() {
    const content = $(this);
    const html = showdown_converter.makeHtml(content.html());

    console.log(html);
    content.html(html);
}

function save_page() {
    const journal_id = $(this).data("journal-id");
    const title = $("#title").val();
    const content = $("#content").val();

    const journal = {
        title,
        content,
    };

    $.ajax({
        url: `/api/journals/${journal_id}`,
        type: "PUT",
        data: journal,
        success: function (data) {
            console.log(data);
        },
    });
}
