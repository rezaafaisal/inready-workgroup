import AirDatepicker from 'air-datepicker';
import localeId from 'air-datepicker/locale/id';
import 'air-datepicker/air-datepicker.css';

function curiculumViate(){
    const dataElement = ['#sd', '#sltp', '#slta'];
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
    
    for (let index = 1; index <= 10; index++) {
        new AirDatepicker('#organization_'+index, {
            locale: localeId,
            // inline: true,
            autoClose: true,
            view: 'years',
            minView: 'years',
            dateFormat: 'yyyy',
            range: true,
            multipleDatesSeparator: ' - '
        });
    }

    new AirDatepicker('#date', {
        locale: localeId,
        isMobile: false,
        autoClose: true,
        dateFormat: 'yyyy-MM-dd'
    });

    new AirDatepicker('#year', {
        locale: localeId,
        autoClose: true,
        view: 'years',
        dateFormat: 'yyyy'
    });
}

export {curiculumViate}