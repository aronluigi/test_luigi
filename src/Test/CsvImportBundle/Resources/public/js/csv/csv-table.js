/**
 * Created by aronluigi on 18/11/13.
 */
Test.csvTable = {
    settings: {
        mapping: mappingFields,
        csvFilePath: '#csvFilePath',
        container: '#csvTable',
        saveAndImport: '.save-import-btn',
        saveImport: '.import-btn',
        saveUrl: '/csv',
        totalRows: 0,
        mappingName: '#mappingName',
        mappingTemplate: '#csvMappingSelect'
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

    getSaveImportData: function() {
        var mapping = this.getCurrentMapping(),
            tableRows = $(this.settings.container).find('tbody > tr'),
            data = {},
            i = 0;

        this.settings.totalRows = tableRows.length;

        tableRows.each(function(){
            var thisRow = this;
            var rowData = {};

            $.each(mapping, function(key, val){
                if (val != 0) {
                    var cellNr = key + 1;

                    rowData[val] = $(thisRow).find('td:nth-child(' + cellNr + ')').html();
                }
            });

            data['r' + i] = rowData;
            i++;
        });

        return data;
    },


    saveButtons: function() {
        var that = this;

        $(this.settings.saveImport).on('click', function() {
            var importData = that.getSaveImportData();

            $.ajax({
                url: that.settings.saveUrl,
                type: "POST",
                data: {'rowData': importData},
                success: function (resposn) {
                    console.log(resposn);
                }
            });
        });

        $(this.settings.saveAndImport).on('click', function() {
            var importData = that.getSaveImportData();
            var saveMappingData = that.getMappingForSave();

            if (saveMappingData != false) {
                $.ajax({
                    url: that.settings.saveUrl,
                    type: "POST",
                    data: {'saveMapping': saveMappingData, 'rowData': importData},
                    success: function (resposn) {
                        console.log(resposn);
                    }
                });
            }
        });
    },

    getMappingForSave: function(){
        var currentSelected = {};
        var mappingSelects = $(this.settings.container).find('select option').filter(':selected');
        var mappingName = $(this.settings.mappingName);
        var alert = mappingName.parent().find('.alert');
        alert.hide('fast');

        if (mappingName.val().length != 0) {
            var data = {};

            mappingSelects.each(function(){
                if ($(this).val() != 0) {
                    var csvColName = $(this).closest('th').find('input[type=hidden]').val();
                    if (csvColName.length != 0) {
                        currentSelected[csvColName] = $(this).val();
                    }
                }
            });

            if (!$.isEmptyObject(currentSelected)) {
                data[mappingName.val()] = currentSelected;
                return data;
            } else {
                alert.html('Please select at least one mapping option!');
                alert.show('fast');
                return false;
            }
        } else {
            alert.html('Please enter the mapping save name!');
            alert.show('fast');
            return false;
        }

    },

    mappingTemplate: function(){
        var that = this;

        $(that.settings.mappingTemplate).on('change', function(){
            $(that.settings.container).find('th select option[value="0"]').attr('selected', 'selected');
            var mappingData = $.parseJSON($(this).val());

            $.each(mappingData, function(col, mapping){
                var colName = $(that.settings.container).find('th input[value=' + col + ']');
                var selectMapping = colName.parent().find('select');

                selectMapping.find('option[value=' + mapping + ']').attr('selected', 'selected');
                colName.parent().fadeOut('slow').fadeIn('slow');
            });
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
        this.mappingTemplate();
    }
};