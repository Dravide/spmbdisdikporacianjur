$(function () {
    "use strict";
    var o, e;
    $("#flot-bar-1").length && $.plot("#flot-bar-1", [{
        data: [
            [0, 3],
            [2, 8],
            [4, 5],
            [6, 13],
            [8, 5],
            [10, 7],
            [12, 4],
            [14, 6]
        ]
    }], {
        series: {
            bars: {
                show: !0,
                lineWidth: 0,
                barWidth: .3,
                fillColor: "#0db4d6"
            }
        },
        grid: {
            borderWidth: 1,
            borderColor: "rgba(123, 145, 158,0.1)",
            labelMargin: 15
        },
        yaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        }
    }), $("#flot-bar-2").length && $.plot("#flot-bar-2", [{
        data: [
            [0, 3],
            [2, 8],
            [4, 5],
            [6, 13],
            [8, 5],
            [10, 7],
            [12, 8],
            [14, 10]
        ],
        bars: {
            show: !0,
            lineWidth: 0,
            barWidth: .3,
            fillColor: "#11c46e"
        },
        label: "New Customer"
    }, {
        data: [
            [1, 5],
            [3, 7],
            [5, 10],
            [7, 7],
            [9, 9],
            [11, 5],
            [13, 4],
            [15, 6]
        ],
        bars: {
            show: !0,
            lineWidth: 0,
            barWidth: .3,
            fillColor: "#7c8a96"
        },
        label: "Returning Customer"
    }], {
        grid: {
            show: !0,
            aboveData: !1,
            labelMargin: 5,
            axisMargin: 0,
            borderWidth: 1,
            minBorderMargin: 5,
            clickable: !0,
            hoverable: !0,
            autoHighlight: !1,
            mouseActiveRadius: 20,
            borderColor: "rgba(123, 145, 158,0.1)"
        },
        series: {
            stack: 0
        },
        legend: {
            show: !1
        },
        yaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        }
    }), $("#flot-line-1").length && (o = [
        [0, 2],
        [1, 3],
        [2, 6],
        [3, 5],
        [4, 7],
        [5, 8],
        [6, 10]
    ], e = [
        [0, 1],
        [1, 2],
        [2, 5],
        [3, 3],
        [4, 5],
        [5, 6],
        [6, 9]
    ], $.plot($("#flot-line-1"), [{
        data: o,
        label: "New Customer",
        color: "#3d8ef8"
    }, {
        data: e,
        label: "Returning Customer",
        color: "#f1b44c"
    }], {
        series: {
            lines: {
                show: !0,
                lineWidth: 1
            },
            shadowSize: 0
        },
        points: {
            show: !1
        },
        legend: {
            position: "ne",
            margin: [0, -32],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function (o, e) {
                return o + "&nbsp;&nbsp;"
            },
            width: 30,
            height: 2
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            borderColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 0,
            labelMargin: 5,
            backgroundColor: "transparent"
        },
        yaxis: {
            min: 0,
            max: 15,
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        }
    })), $("#flot-line-2").length && $.plot($("#flot-line-2"), [{
        data: [
            [0, 2],
            [1, 3],
            [2, 6],
            [3, 5],
            [4, 7],
            [5, 8],
            [6, 10]
        ],
        label: "New Customer",
        color: "#fb4d53"
    }, {
        data: [
            [0, 1],
            [1, 2],
            [2, 5],
            [3, 3],
            [4, 5],
            [5, 6],
            [6, 9]
        ],
        label: "Returning Customer",
        color: "#0db4d6"
    }], {
        series: {
            lines: {
                show: !0,
                lineWidth: 0
            },
            splines: {
                show: !0,
                tension: .4,
                lineWidth: 1
            },
            shadowSize: 0
        },
        points: {
            show: !1
        },
        legend: {
            position: "ne",
            margin: [0, -32],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function (o, e) {
                return o + "&nbsp;&nbsp;"
            },
            width: 30,
            height: 2
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            borderColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 0,
            labelMargin: 5,
            backgroundColor: "transparent"
        },
        yaxis: {
            min: 0,
            max: 20,
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        }
    }), $("#flot-line-3").length && $.plot($("#flot-line-3"), [{
        data: [
            [0, 10],
            [1, 7],
            [2, 8],
            [3, 9],
            [4, 6],
            [5, 5],
            [6, 7]
        ],
        label: "New Customer",
        color: "#f1734f"
    }, {
        data: [
            [0, 8],
            [1, 5],
            [2, 6],
            [3, 8],
            [4, 4],
            [5, 3],
            [6, 6]
        ],
        label: "Returning Customer",
        color: "#11c46e"
    }], {
        series: {
            lines: {
                show: !0,
                lineWidth: 2
            },
            shadowSize: 0
        },
        points: {
            show: !0
        },
        legend: {
            position: "ne",
            margin: [0, -32],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function (o, e) {
                return o + "&nbsp;&nbsp;"
            },
            width: 30,
            height: 2
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            borderColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 0,
            labelMargin: 5,
            backgroundColor: "transparent"
        },
        yaxis: {
            min: 0,
            max: 15,
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        }
    }), $("#flot-line-4").length && $.plot($("#flot-line-4"), [{
        data: [
            [0, 10],
            [1, 7],
            [2, 8],
            [3, 9],
            [4, 6],
            [5, 5],
            [6, 7]
        ],
        label: "New Customer",
        color: "#008080"
    }, {
        data: [
            [0, 8],
            [1, 5],
            [2, 6],
            [3, 8],
            [4, 4],
            [5, 3],
            [6, 6]
        ],
        label: "Returning Customer",
        color: "#564ab1"
    }], {
        series: {
            lines: {
                show: !1
            },
            splines: {
                show: !0,
                tension: .4,
                lineWidth: 2
            },
            shadowSize: 0
        },
        points: {
            show: !0
        },
        legend: {
            position: "ne",
            margin: [0, -32],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function (o, e) {
                return o + "&nbsp;&nbsp;"
            },
            width: 30,
            height: 2
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            borderColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 0,
            labelMargin: 5,
            backgroundColor: "transparent"
        },
        yaxis: {
            min: 0,
            max: 15,
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        }
    }), $("#flot-area-1").length && $.plot($("#flot-area-1"), [{
        data: o,
        label: "New Customer",
        color: "#0db4d6"
    }, {
        data: e,
        label: "Returning Customer",
        color: "#4E6577"
    }], {
        series: {
            lines: {
                show: !0,
                lineWidth: 0,
                fill: .8
            },
            shadowSize: 0
        },
        points: {
            show: !1
        },
        legend: {
            position: "ne",
            margin: [0, -32],
            noColumns: 0,
            labelBoxBorderColor: null,
            labelFormatter: function (o, e) {
                return o + "&nbsp;&nbsp;"
            },
            width: 30,
            height: 2
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            borderColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 0,
            labelMargin: 5,
            backgroundColor: "transparent"
        },
        yaxis: {
            min: 0,
            max: 15,
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        }
    }), $("#flot-area-2").length && $.plot($("#flot-area-2"), [{
        data: o,
        label: "New Customer",
        color: "#11c46e"
    }, {
        data: e,
        label: "Returning Customer",
        color: "#38414a"
    }], {
        series: {
            lines: {
                show: !0,
                lineWidth: 0,
                fill: 0
            },
            splines: {
                show: !0,
                tension: .4,
                lineWidth: 0,
                fill: .8
            },
            shadowSize: 0
        },
        points: {
            show: !1
        },
        legend: {
            position: "ne",
            margin: [0, -32],
            noColumns: 0,
            labelBoxBorderColor: "transparent",
            labelFormatter: function (o, e) {
                return o + "&nbsp;&nbsp;"
            },
            width: 30,
            height: 2
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            borderColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 0,
            labelMargin: 5,
            backgroundColor: "transparent"
        },
        yaxis: {
            min: 0,
            max: 15,
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        tooltip: !0,
        tooltipOpts: {
            content: "%s : %y.0",
            shifts: {
                x: -30,
                y: -50
            }
        }
    });
    var r = [],
        l = 50;

    function t() {
        for (0 < r.length && (r = r.slice(1)); r.length < l;) {
            var o = (0 < r.length ? r[r.length - 1] : 50) + 10 * Math.random() - 5;
            o < 0 ? o = 0 : 100 < o && (o = 100), r.push(o)
        }
        for (var e = [], t = 0; t < r.length; ++t) e.push([t, r[t]]);
        return e
    }

    var i = 1e3,
        a = $.plot("#flot-realtime-1", [t()], {
            colors: ["#fb4d53"],
            series: {
                grow: {
                    active: !1
                },
                shadowSize: 0,
                lines: {
                    show: !0,
                    fill: !1,
                    lineWidth: 2,
                    steps: !1
                }
            },
            grid: {
                show: !0,
                aboveData: !1,
                color: "#dcdcdc",
                labelMargin: 15,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: !0,
                hoverable: !0,
                autoHighlight: !1,
                mouseActiveRadius: 20
            },
            tooltip: !0,
            tooltipOpts: {
                content: "Value is : %y.0%",
                shifts: {
                    x: -30,
                    y: -50
                }
            },
            yaxis: {
                axisLabel: "Response Time (ms)",
                min: 0,
                max: 100,
                tickColor: "rgba(123, 145, 158,0.1)",
                font: {
                    color: "#7b919e",
                    size: 10
                }
            },
            xaxis: {
                axisLabel: "Point Value (1000)",
                show: !0,
                tickColor: "rgba(123, 145, 158,0.1)",
                font: {
                    color: "#7b919e",
                    size: 10
                }
            }
        }),
        s = $.plot("#flot-realtime-2", [t()], {
            colors: ["#3d8ef8"],
            series: {
                grow: {
                    active: !1
                },
                shadowSize: 0,
                lines: {
                    show: !0,
                    fill: .3,
                    lineWidth: 1,
                    steps: !1
                }
            },
            grid: {
                show: !0,
                aboveData: !1,
                color: "#dcdcdc",
                labelMargin: 15,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: !0,
                hoverable: !0,
                autoHighlight: !1,
                mouseActiveRadius: 20
            },
            tooltip: !0,
            tooltipOpts: {
                content: "Value is : %y.0%",
                shifts: {
                    x: -30,
                    y: -50
                }
            },
            yaxis: {
                axisLabel: "Response Time (ms)",
                min: 0,
                max: 100,
                tickColor: "rgba(123, 145, 158,0.1)",
                font: {
                    color: "#7b919e",
                    size: 10
                }
            },
            xaxis: {
                axisLabel: "Point Value (1000)",
                show: !0,
                tickColor: "rgba(123, 145, 158,0.1)",
                font: {
                    color: "#7b919e",
                    size: 10
                }
            }
        });
    !function o() {
        a.setData([t()]), a.draw(), setTimeout(o, i)
    }(),
        function o() {
            s.setData([t()]), s.draw(), setTimeout(o, i)
        }();
    var n = [{
        label: "Series 1",
        data: [
            [1, 40]
        ],
        color: "#3d8ef8"
    }, {
        label: "Series 2",
        data: [
            [1, 30]
        ],
        color: "#7c8a96"
    }, {
        label: "Series 3",
        data: [
            [1, 50]
        ],
        color: "#11c46e"
    }, {
        label: "Series 4",
        data: [
            [1, 70]
        ],
        color: "#f1b44c"
    }, {
        label: "Series 5",
        data: [
            [1, 80]
        ],
        color: "#36B3E3"
    }];
    $.plot("#flot-pie", n, {
        series: {
            pie: {
                show: !0,
                radius: 1,
                label: {
                    show: !0,
                    radius: 2 / 3,
                    formatter: function (o, e) {
                        return "<div style='font-size:10pt; text-align:center; padding:2px; color:white;'>" + o + "<br/>" + Math.round(e.percent) + "%</div>"
                    },
                    threshold: .1
                }
            }
        },
        grid: {
            hoverable: !0,
            clickable: !0
        },
        legend: {
            show: !1
        }
    }), $.plot("#flot-donut", n, {
        series: {
            pie: {
                show: !0,
                radius: 1,
                innerRadius: .75,
                label: {
                    show: !0,
                    radius: .4,
                    formatter: function (o, e) {
                        return "<div style='font-size:10pt; text-align:center; padding:2px;'>" + o + "<br/>" + Math.round(e.percent) + "%</div>"
                    },
                    threshold: .1
                }
            }
        },
        grid: {
            hoverable: !0,
            clickable: !0
        },
        legend: {
            show: !1
        },
        tooltip: !1,
        tooltipOpts: {
            content: "Value is : %y.0%",
            shifts: {
                x: -30,
                y: -50
            }
        }
    })
}), $(function () {
    var o = [{
            label: "Last 24 Hours",
            data: [
                [0, 601],
                [1, 520],
                [2, 337],
                [3, 261],
                [4, 157],
                [5, 78],
                [6, 58],
                [7, 48],
                [8, 54],
                [9, 38],
                [10, 88],
                [11, 214],
                [12, 364],
                [13, 449],
                [14, 558],
                [15, 282],
                [16, 379],
                [17, 429],
                [18, 518],
                [19, 470],
                [20, 330],
                [21, 245],
                [22, 358],
                [23, 74]
            ],
            lines: {
                show: !0,
                fill: !0
            },
            points: {
                show: !0
            }
        }, {
            label: "Last 48 Hours",
            data: [
                [0, 445],
                [1, 592],
                [2, 738],
                [3, 532],
                [4, 234],
                [5, 143],
                [6, 147],
                [7, 63],
                [8, 64],
                [9, 43],
                [10, 86],
                [11, 201],
                [12, 315],
                [13, 397],
                [14, 512],
                [15, 281],
                [16, 360],
                [17, 479],
                [18, 425],
                [19, 453],
                [20, 422],
                [21, 355],
                [22, 340],
                [23, 801]
            ],
            lines: {
                show: !0
            },
            points: {
                show: !0
            }
        }, {
            label: "Difference",
            data: [
                [23, 727],
                [22, 18],
                [21, 110],
                [20, 92],
                [19, 17],
                [18, 93],
                [17, 50],
                [16, 19],
                [15, 1],
                [14, 46],
                [13, 52],
                [12, 49],
                [11, 13],
                [10, 2],
                [9, 5],
                [8, 10],
                [7, 15],
                [6, 89],
                [5, 65],
                [4, 77],
                [3, 271],
                [2, 401],
                [1, 72],
                [0, 156]
            ],
            bars: {
                show: !0
            }
        }],
        e = {
            xaxis: {
                ticks: [
                    [0, "22h"],
                    [1, ""],
                    [2, "00h"],
                    [3, ""],
                    [4, "02h"],
                    [5, ""],
                    [6, "04h"],
                    [7, ""],
                    [8, "06h"],
                    [9, ""],
                    [10, "08h"],
                    [11, ""],
                    [12, "10h"],
                    [13, ""],
                    [14, "12h"],
                    [15, ""],
                    [16, "14h"],
                    [17, ""],
                    [18, "16h"],
                    [19, ""],
                    [20, "18h"],
                    [21, ""],
                    [22, "20h"],
                    [23, ""]
                ],
                tickColor: "rgba(123, 145, 158,0.1)",
                font: {
                    color: "#7b919e",
                    size: 10
                }
            },
            yaxis: {
                tickColor: "rgba(123, 145, 158,0.1)",
                font: {
                    color: "#7b919e",
                    size: 10
                }
            },
            series: {
                shadowSize: 0
            },
            grid: {
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(123, 145, 158,0.1",
                borderWidth: 1,
                borderColor: "rgba(123, 145, 158,0.1)"
            },
            colors: ["#dfe3e9", "#fb4d53", "#0db4d6"],
            tooltip: !0,
            tooltipOpts: {
                defaultTheme: !1
            },
            legend: {
                labelBoxBorderColor: "transparent",
                container: $("#combine-chart-labels"),
                noColumns: 0
            }
        };
    $.plot($("#combine-chart #combine-chartContainer"), o, e)
}), $(function () {
    var t = [o(0), o(100), o(200)];

    function o(o) {
        var e = [],
            t = 100 + o,
            r = 200 + o;
        for (i = 1; i <= 100; i++) {
            var l = Math.floor(Math.random() * (r - t + 1) + t);
            e.push([i, l]), t++, r++
        }
        return e
    }

    var r = {
        series: {
            stack: !0,
            shadowSize: 0
        },
        xaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        yaxis: {
            tickColor: "rgba(123, 145, 158,0.1)",
            font: {
                color: "#7b919e",
                size: 10
            }
        },
        grid: {
            hoverable: !0,
            clickable: !0,
            tickColor: "rgba(123, 145, 158,0.1)",
            borderWidth: 1,
            borderColor: "rgba(123, 145, 158,0.1)"
        },
        legend: {
            show: !1
        },
        colors: ["#f1b44c", "#7c8a96", "#dfe3e9"],
        tooltip: !0
    };

    function e() {
        var e = [];
        $("#toggle-chart input[type='checkbox']").each(function () {
            var o;
            $(this).is(":checked") && (o = $(this).attr("id").replace("cbdata", ""), e.push({
                label: "Data " + o,
                data: t[o - 1]
            }))
        }), r.series.lines = {}, r.series.bars = {}, $("#toggle-chart input[type='radio']").each(function () {
            $(this).is(":checked") && ("line" == $(this).val() ? r.series.lines = {
                fill: !0
            } : r.series.bars = {
                show: !0
            })
        }), $.plot($("#toggle-chart #toggle-chartContainer"), e, r)
    }

    $("#toggle-chart input").change(function () {
        e()
    }), e()
});
