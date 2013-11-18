/**
 * Created by aronluigi on 18/11/13.
 */
Test.csvTable = {
    settings: {
        mapping: mappingFields,
        csvFilePath: '#csvFilePath',
        container: '#csvTable',
        saveAndImport: '.save-import-btn',
        saveImport: '.import-btn'
    },

    generateTable: function() {
        var that = this,
            csvPath = $(this.settings.csvFilePath).val();

        $(that.settings.container).CSVToTable(csvPath, {
            separator: ';',
            tableClass: 'table table-bordered'
        }).on("loadComplete", function () {
                that.createTableHeaderLinks();
            });
    },

    createTableHeaderLinks: function() {
        var that = this,
            tableHead = $(this.settings.container).find('th');

        var mappingSelect = $('<select></select>');
        mappingSelect.append('<option value="0" selected>Select mapping</option>');

        $.each(that.settings.mapping, function(key, val){
            mappingSelect.append('<option value="' + key + '">'+ val +'</option>');
        });

        tableHead.each(function() {
            $(this).append('<input type="hidden" value="' + $(this).html() + '">');
            $(this).append("<select>" + $(mappingSelect).html() + "</select>");

            $(this).on('change', function(){
                that.mappingSelect();
            });
        });
    },

    mappingSelect: function(){
        var that = this,
            currentSelected = [],
            mappingSelects = $(this.settings.container).find('select option').filter(':selected');

        mappingSelects.each(function(){
            var val = $(this).val();

            if (val != 0) {
                currentSelected.push(val);
            }
        });

        mappingSelects.each(function() {
            var parentOptions = $(this).parent().find('option');
            var selectedOption = $(this).val();

            parentOptions.each(function() {
                $(this).removeAttr('disabled');

                if ($.inArray($(this).val(), currentSelected) != -1) {
                    if ($(this).val() != 0 && $(this).val() != selectedOption) {
                        $(this).attr('disabled', 'disabled');
                    }
                }
            });
        });
    },

    getCurrentMapping: function() {
        var currentSelected = [];
        var mappingSelects = $(this.settings.container).find('select option').filter(':selected');

        mappingSelects.each(function(){
            currentSelected.push($(this).val());
        });

        return currentSelected;
    },

    saveImport: function() {
        var mapping = this.getCurrentMapping();

        console.log(mapping);
    },

    saveButtons: function(){
        var that = this;
        $(this.settings.saveImport).on('click', function() {
            that.saveImport();
        });
    },

    //@TODO with this you can edit the table cells
    createEditableCells: function() {
        var that = this,
            dataTable = $(that.settings.container).find('table');

        dataTable.dataTable({
            bPaginate: false,
            bInfo: false,
            bFilter: false
        });

        dataTable.find('td').editable('',{
            'height': '20px',
            'width': '100%'
        });
    },

    init: function() {
        this.generateTable();
        this.saveButtons();
    }
};