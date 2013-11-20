/**
 * Created by aronluigi on 20/11/13.
 */
Test.orderTable = {
    settings: {
        'table': '#ordersTable'
    },

    setDataTable: function(){
        $(this.settings.table).dataTable({
            "sScrollY": 250,
            "sScrollX": "100%"
        });
    },

    init: function(){
        this.setDataTable();
    }
};