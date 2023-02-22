import AirDatepicker from 'air-datepicker';
import localeId from 'air-datepicker/locale/id';
import 'air-datepicker/air-datepicker.css';

new AirDatepicker('.date', {
    locale: localeId,
    isMobile: false,
    autoClose: true,
});

new AirDatepicker('.year', {
    locale: localeId,
    autoClose: true,
    view: 'years',
    dateFormat: 'yyyy'
});

function curiculumViate(){
    const dataElement = ['#sd', '#sltp', '#slta', '#organization_1', '#organization_2', '#organization_3', '#organization_4', '#organization_4', '#organization_5', '#organization_6', '#organization_7', '#organization_7', '#organization_8', '#organization_9'];
    dataElement.forEach(element => {
        new AirDatepicker(element, {
            locale: localeId,
            autoClose: true,
            view: 'years',
            minView: 'years',
            dateFormat: 'yyyy',
            range: true,
            multipleDatesSeparator: ' - '
        })
    });

    new AirDatepicker('#organization_2', {
            locale: localeId,
            autoClose: true,
            view: 'years',
            minView: 'years',
            dateFormat: 'yyyy',
            range: true,
            multipleDatesSeparator: ' - '
        })
}

export {curiculumViate}