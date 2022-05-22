<x-layout>
    <x-navbar :is-logged-in="$is_logged_in ?? false" current-page="sitemap" :is-authorized="$is_authorized ?? false" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <!---- Must Add above thing or you can use alternative icons or CSS Entities---->
    <style>
        .tree li {
            list-style-type: none;
            margin: 0;
            padding: 10px 5px 0 5px;
            position: relative
        }

        .tree li::before,
        .tree li::after {
            content: '';
            left: -20px;
            position: absolute;
            right: auto
        }

        .tree li::before {
            border-left: 2px solid #000;
            bottom: 50px;
            height: 100%;
            top: 0;
            width: 1px
        }

        .tree li::after {
            border-top: 2px solid #000;
            height: 20px;
            top: 25px;
            width: 25px
        }

        .tree li span {
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            border: 2px solid #000;
            border-radius: 3px;
            display: inline-block;
            padding: 3px 8px;
            text-decoration: none;
            cursor: pointer;
        }

        .tree>ul>li::before,
        .tree>ul>li::after {
            border: 0
        }

        .tree li:last-child::before {
            height: 27px
        }

        .tree li span:hover {
            background: purple;
            border: 2px solid #94a0b4;
            color: white;
        }

        [aria-expanded="false"]>.expanded,
        [aria-expanded="true"]>.collapsed {
            display: none;
        }

        .sitemap-container.container {
            min-height: 80vh;
            display: flex;
        }

        .sitemap-container {
            padding: 3rem 0;
        }

        .sitemap-container .row {
            padding: 3rem 0;
            justify-content: center;
            margin: 0 auto;
        }

    </style>
    <div class="sitemap-container container">
        <div class="row">
            <h2 class="col-8 mb-4">Site Map</h2>
            <div class="tree col-8">
                <ul>
                    <li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse" href="/"
                                aria-expanded="true" aria-controls="Web"><i class="collapsed"><i
                                        class="fas fa-folder"></i></i>
                                <i class="expanded"><i class="far fa-folder-open"></i></i>Scribble</a></span>
                        <div id="Web" class="collapse show">
                            <ul>
                                <li><span><i class="far fa-file"></i><a href="/">Home</a></span></li>
                                <li><span><i class="far fa-file"></i><a href="/pricing">Pricing</a></span></li>
                                <li><span><i class="far fa-file"></i><a href="/about-us">About Us</a></span></li>
                                <li><span><i class="far fa-file"></i><a href="/features">Features</a></span></li>
                                <li><span><a style="color:#000; text-decoration:none;" data-toggle="collapse"
                                            href="/dashboard" aria-expanded="true" aria-controls="Web"><i
                                                class="collapsed"><i class="fas fa-folder"></i></i>
                                            <i class="expanded"><i
                                                    class="far fa-folder-open"></i></i>Dashboard</a></span>
                                    <div id="Web" class="collapse show">
                                        <ul>
                                            <li><span><i class="far fa-file"></i><a
                                                        href="/journals">Journals</a></span>
                                            </li>
                                            <li><span><i class="far fa-file"></i><a href="/list">List</a></span></li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>

                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <x-footer />
</x-layout>
