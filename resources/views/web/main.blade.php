@extends('layouts.web')

@section('content')
    <section class="home">

        <div class="row">
            <div class="col-2">
                <div class="widget chart-widget">
                    <div class="widget-header">Красные/Черные победы</div>
                    <div class="widget-body">
                        <div id='myChart'><a class="zc-ref" href="https://www.zingchart.com/">Powered by ZingChart</a></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/plugins/zingchart/zingchart.js') }}"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
        var myConfig = {
            backgroundColor: '#FBFCFE',
            type: "ring",
            title: {
                text: "Monthly Page Views",
                fontFamily: 'Lato',
                fontSize: 14,
                // border: "1px solid black",
                padding: "15",
                fontColor: "#1E5D9E",
            },
            subtitle: {
                text: "06/10/16 - 07/11/16",
                fontFamily: 'Lato',
                fontSize: 12,
                fontColor: "#777",
                padding: "5"
            },
            plot: {
                slice: '50%',
                borderWidth: 0,
                backgroundColor: '#FBFCFE',
                animation: {
                    effect: 2,
                    sequence: 3
                },
                valueBox: [{
                    type: 'all',
                    text: '%t',
                    placement: 'out'
                }, {
                    type: 'all',
                    text: '%npv%',
                    placement: 'in'
                }]
            },
            tooltip: {
                fontSize: 16,
                anchor: 'c',
                x: '50%',
                y: '50%',
                sticky: true,
                backgroundColor: 'none',
                borderWidth: 0,
                thousandsSeparator: ',',
                text: '<span style="color:%color">Page Url: %t</span><br><span style="color:%color">Pageviews: %v</span>',
                mediaRules: [{
                    maxWidth: 500,
                    y: '54%',
                }]
            },
            plotarea: {
                backgroundColor: 'transparent',
                borderWidth: 0,
                borderRadius: "0 0 0 10",
                margin: "70 0 10 0"
            },
            legend: {
                toggleAction: 'remove',
                backgroundColor: '#FBFCFE',
                borderWidth: 0,
                adjustLayout: true,
                align: 'center',
                verticalAlign: 'bottom',
                marker: {
                    type: 'circle',
                    cursor: 'pointer',
                    borderWidth: 0,
                    size: 5
                },
                item: {
                    fontColor: "#777",
                    cursor: 'pointer',
                    offsetX: -6,
                    fontSize: 12
                },
                mediaRules: [{
                    maxWidth: 500,
                    visible: false
                }]
            },
            scaleR: {
                refAngle: 270
            },
            series: [{
                text: "Docs",
                values: [106541],
                lineColor: "#00BAF2",
                backgroundColor: "#00BAF2",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#00BAF2'
                }
            }, {
                text: "Gallery",
                values: [56711],
                lineColor: "#E80C60",
                backgroundColor: "#E80C60",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#E80C60'
                }
            }, {
                text: "Index",
                values: [43781],
                lineColor: "#9B26AF",
                backgroundColor: "#9B26AF",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#9B26AF'
                }
            }]
        };

        zingchart.render({
            id: 'myChart',
            data: {
                gui: {
                    contextMenu: {
                        button: {
                            visible: true,
                            lineColor: "#2D66A4",
                            backgroundColor: "#2D66A4"
                        },
                        gear: {
                            alpha: 1,
                            backgroundColor: "#2D66A4"
                        },
                        position: "right",
                        backgroundColor: "#306EAA",
                        /*sets background for entire contextMenu*/
                        docked: true,
                        item: {
                            backgroundColor: "#306EAA",
                            borderColor: "#306EAA",
                            borderWidth: 0,
                            fontFamily: "Lato",
                            color: "#fff"
                        }

                    },
                },
                graphset: [myConfig]
            },
            height: '499',
            width: '99%'
        });
    </script>
@endsection
