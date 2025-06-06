"use strict";
!(function(maps) {
    "use strict";
    var b = function() {};
    (b.prototype.init = function() {
        maps("#world-map").vectorMap({
                map: "world_mill_en",
                scaleColors: ["#2196F3", "#1B8BF9"],
                normalizeFunction: "polynomial",
                hoverOpacity: 0.7,
                hoverColor: !1,
                regionStyle: {
                    initial: {
                        fill: "#2B5F60",
                    },
                },
                backgroundColor: "transparent",
            }),
            maps("#world-map2").vectorMap({
                map: "world_mill_en",
                // scaleColors: ["#4b2a4b", "#4b2a4b"],
                normalizeFunction: "polynomial",
                hoverOpacity: .8,
                hoverColor: !1,
                regionStyle: {
                    initial: {
                        fill: [ZonoAdminConfig.primary],
                    }
                },
                backgroundColor: "transparent",
            })
        maps("#asia").vectorMap({
                map: "asia_mill",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#ff9f40",
                    },
                },
            }),
            maps("#india").vectorMap({
                map: "in_mill",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#007bff",
                    },
                },
            }),
            maps("#usa").vectorMap({
                map: "us_aea_en",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#a26cf8",
                    },
                },
            }),
            maps("#uk").vectorMap({
                map: "uk_mill_en",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#FF5370",
                    },
                },
            }),
            maps("#canada").vectorMap({
                map: "uk_mill_en",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#22af47",
                    },
                },
            }),
            maps("#chicago").vectorMap({
                map: "us-il-chicago_mill_en",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#fb6d9d",
                    },
                },
            }),
            maps("#australia").vectorMap({
                map: "au_mill",
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: "#263238",
                    },
                },
            });
    }),
    (maps.VectorMap = new b()),
    (maps.VectorMap.Constructor = b);
})(window.jQuery),
(function(maps) {
    "use strict";
    maps.VectorMap.init();
})(window.jQuery);