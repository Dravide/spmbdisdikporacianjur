!function (n) {
    "use strict";
    n(function () {
        var e, a, r, o, t;
        Chart.defaults.global.defaultFontColor = "#7b919e", Chart.defaults.scale.gridLines.color = "rgba(123, 145, 158,0.1)", n("#lineChart").length && (e = n("#lineChart").get(0).getContext("2d"), new Chart(e, {
            type: "line",
            data: {
                labels: ["2013", "2014", "2014", "2015", "2016", "2017", "2018", "2019"],
                datasets: [{
                    label: "Apple",
                    data: [120, 180, 140, 210, 160, 240, 180, 210],
                    borderColor: ["#0db4d6"],
                    borderWidth: 3,
                    fill: !1,
                    pointBackgroundColor: "#ffffff",
                    pointBorderColor: "#0db4d6"
                }, {
                    label: "Samsung",
                    data: [80, 140, 100, 170, 120, 200, 140, 170],
                    borderColor: ["#7c8a96"],
                    borderWidth: 3,
                    fill: !1,
                    pointBackgroundColor: "#ffffff",
                    pointBorderColor: "#7c8a96"
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: !1,
                            borderDash: [3, 3],
                            zeroLineColor: "#7b919e"
                        },
                        ticks: {
                            min: 0,
                            color: "#7b919e"
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: !1,
                            drawBorder: !1,
                            color: "#ffffff"
                        }
                    }]
                },
                elements: {
                    line: {
                        tension: .2
                    },
                    point: {
                        radius: 4
                    }
                },
                stepsize: 1
            }
        })), n("#barChart").length && (a = n("#barChart").get(0).getContext("2d"), new Chart(a, {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep"],
                datasets: [{
                    label: "Apple",
                    data: [46, 57, 59, 54, 62, 58, 64, 60, 66],
                    backgroundColor: "#eff2f7"
                }, {
                    label: "Samsung",
                    data: [74, 83, 102, 97, 86, 106, 93, 114, 94],
                    backgroundColor: "#3d8ef8"
                }, {
                    label: "Oppo",
                    data: [37, 42, 38, 26, 47, 50, 54, 55, 43],
                    backgroundColor: "#11c46e"
                }]
            },
            options: {
                responsive: !0,
                maintainAspectRatio: !0,
                scales: {
                    yAxes: [{
                        display: !1,
                        gridLines: {
                            drawBorder: !1
                        },
                        ticks: {
                            fontColor: "#686868"
                        }
                    }],
                    xAxes: [{
                        barPercentage: .7,
                        categoryPercentage: .5,
                        ticks: {
                            fontColor: "#7b919e"
                        },
                        gridLines: {
                            display: !1,
                            drawBorder: !1
                        }
                    }]
                },
                elements: {
                    point: {
                        radius: 0
                    }
                }
            }
        })), n("#areaChart").length && (r = n("#areaChart").get(0).getContext("2d"), new Chart(r, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    data: [22, 23, 28, 20, 27, 20, 20, 24, 10, 35, 20, 25],
                    backgroundColor: ["#f1b44c"],
                    borderColor: ["#f1b44c"],
                    borderWidth: 2,
                    fill: "origin",
                    label: "Upcube"
                }, {
                    data: [50, 40, 48, 70, 50, 63, 63, 42, 42, 51, 35, 35],
                    backgroundColor: ["rgba(124, 138, 150, 0.3)"],
                    borderColor: ["#7c8a96"],
                    borderWidth: 1,
                    fill: "origin",
                    label: "Zinzer"
                }, {
                    data: [95, 75, 90, 105, 95, 95, 95, 100, 75, 95, 90, 105],
                    backgroundColor: ["rgba(223, 227, 233, 0.2)"],
                    borderColor: ["#dfe3e9"],
                    borderWidth: 1,
                    fill: "origin",
                    label: "Drixo"
                }]
            },
            options: {
                responsive: !0,
                maintainAspectRatio: !0,
                plugins: {
                    filler: {
                        propagate: !1
                    }
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: !1,
                            drawBorder: !1,
                            color: "transparent",
                            zeroLineColor: "#eeeeee"
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            drawBorder: !1,
                            borderDash: [3, 3]
                        }
                    }]
                },
                legend: {
                    display: !1
                },
                tooltips: {
                    enabled: !0
                },
                elements: {
                    line: {
                        tension: 0
                    },
                    point: {
                        radius: 0
                    }
                }
            }
        })), areaChart, n("#pieChart").length && (o = n("#pieChart").get(0).getContext("2d"), new Chart(o, {
            type: "pie",
            data: {
                datasets: [{
                    data: [21, 16, 48, 31],
                    backgroundColor: ["#0db4d6", "#f1b44c", "#fb4d53", "#343a40"],
                    borderColor: ["#0db4d6", "#f1b44c", "#fb4d53", "#343a40"]
                }],
                labels: ["Drixo", "Upcube", "Vakavia", "Devazo"]
            },
            options: {
                responsive: !0,
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        })), n("#donut-chart").length && (o = n("#donut-chart").get(0).getContext("2d"), new Chart(o, {
            type: "pie",
            data: {
                datasets: [{
                    data: [21, 16, 48, 31],
                    backgroundColor: ["#3d8ef8", "#7c8a96", "#11c46e", "#f1b44c"],
                    borderColor: ["#3d8ef8", "#7c8a96", "#11c46e", "#f1b44c"]
                }],
                labels: ["Drixo", "Upcube", "Vakavia", "Devazo"]
            },
            options: {
                responsive: !0,
                cutoutPercentage: 70,
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        })), n("#radar-chart").length && (t = n("#radar-chart").get(0).getContext("2d"), new Chart(t, {
            type: "radar",
            data: {
                datasets: [{
                    label: "Unhealthy",
                    backgroundColor: "rgba(223, 227, 233, 0.2)",
                    borderColor: "#dfe3e9",
                    borderWidth: 1,
                    pointBackgroundColor: "#dfe3e9",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#dfe3e9",
                    data: [65, 59, 90, 81, 56, 55, 40]
                }, {
                    label: "Healthy",
                    backgroundColor: "rgba(61, 142, 248,0.2)",
                    borderColor: "#3d8ef8",
                    borderWidth: 1,
                    pointBackgroundColor: "#3d8ef8",
                    pointBorderColor: "#fff",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "#3d8ef8",
                    data: [28, 48, 40, 19, 96, 27, 100]
                }],
                labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"]
            },
            options: {
                responsive: !0,
                cutoutPercentage: 70,
                animation: {
                    animateScale: !0,
                    animateRotate: !0
                }
            }
        }))
    })
}(jQuery);
