/*
    Author: Iván López
*/

var base_url = 'http://127.0.0.1:8082';
var user;

$(document).ready(function () {

    if (typeof skip_login_check === 'undefined') {
        check_api_session();
    }

    $('body').on('click', 'a[disabled="disabled"]', function (event) {
        event.stopPropagation();
        event.preventDefault();

        return false;
    });

    $('#login-form').submit(function (e) {
        var frm = $(this);

        var username = $(this).find('[name="username"]').val()
        var password = $(this).find('[name="password"]').val()

        authToken(username, password)

        return pevent(e);
    });

    $('#profileForm').submit(function (event) {
        var $form = $(event.currentTarget);

        $.ajax({
            type: "PUT",
            url: base_url + '/api/user?' + new Date().getTime(),
            data: $form.serialize(),
            headers: {
                'Authorization': 'Bearer ' + getCookie('tokenAccess')
            },
            success: function (response) {
                if (response.result == 'ok') {
                    alert('Usuario modificado!');
                } else {
                    alert('Error: '  + response.message);
                }
            },
            error: function (response) {
                alert(response.message);
            }
        });

        return pevent(event );
    });
});

function getCiudadForm()
{
    $.ajax({
        type: "GET",
        url: base_url + '/api/getCiudadForm?' + new Date().getTime(),
        headers: {
            'Authorization': 'Bearer ' + getCookie('tokenAccess')
        },
        success: function (response) {
            var html_response = '';

            for (let i = 0; i < response.data.length; i++) {
                html_response += '<option value="' + response.data[i].id + '" ' + (user.ciudadId == response.data[i].id ? 'selected' : '') + '>' + response.data[i].ciudad + '</option>';
            }

            $('#ciudad_frm').html(html_response);
        },
        error: function (response) {
            alert(response.message);
        }
    });
}

function getUserData()
{
    $.ajax({
        type: "GET",
        url: base_url + '/api/getUserData?' + new Date().getTime(),
        headers: {
            'Authorization': 'Bearer ' + getCookie('tokenAccess')
        },
        success: function (response) {
            var html_response = '';

            for (let i = 0; i < response.data.length; i++) {
                html_response += buildUserDataItem(response.data[i]);
            }

            $('#userData').html(html_response);
        },
        error: function (response) {
            alert(response.message);
        }
    });
}

function buildUserDataItem(v) {
    var html_response = '<div class="userData-item mb-5">'
        + '<h3 class="text-2xl mb-3">Fecha chat: ' + v.fecha + ' | Estado: ' + (v.completado ? 'completado':'pendiente') + '</h3>';

    for (let i = 0; i < v.preguntas.length; i++) {
        html_response += '<p class="pregunta">Pregunta: <label>' + v.preguntas[i].titulo + ': ' + v.preguntas[i].descripcion + '</label></p>';
        html_response += '<p class="respuesta">Respuesta: <label>' + v.preguntas[i].respuesta + '</label></p>';
    }

    if (v.completado) {
        html_response += '<p class="producto">Producto financiero recomendado \'' + v.producto.nombre + '\': tasaInteres: ' + v.producto.tasaInteres + ', plazo: ' + v.producto.plazo + ', montoMaxInversion: ' + v.producto.montoMaxInversion + ', requisitosIngresosMinimos: ' + v.producto.requisitosIngresosMinimos + ', garantias: ' + v.producto.garantias + ', costosAdicionales: ' + v.producto.costosAdicionales + ', beneficiosAdicionales: ' + v.producto.beneficiosAdicionales + ', tipoProducto: ' + v.producto.tipoProducto.tipo + '<label></label></p>';
    }
    html_response += '---------------';

    return html_response;
}

function getErrorsFromResponse(response) {
    var errorObj = response.responseJSON ?? response;
    var error_txt = errorObj.message + '\r\n';

    for (var item in errorObj.errors.children) {
        var err = errorObj.errors.children[item];
        if ($(err?.errors).length > 0) {
            error_txt += item + ': ' + err.errors[0] + '\r\n';
        }
    }

    return error_txt;
}

function pevent(event) {
    event.stopPropagation();
    event.preventDefault();

    return false;
}

function setCookie(name, value, daysToExpire) {
    var cookie = name + "=" + encodeURIComponent(value);

    if (daysToExpire) {
        var expirationDate = new Date();
        expirationDate.setDate(expirationDate.getDate() + daysToExpire);
        cookie += "; expires=" + expirationDate.toUTCString();
    }

    document.cookie = cookie;
}

function authToken(username, password) {

    $.ajax({
        url: base_url + '/api/login_check',
        type: 'POST',
        data:JSON.stringify({username:username,password:password}),
        headers: {
            'Content-Type': 'application/json'
        },
        success: function (data) {
            setCookie('tokenAccess', data.token, 2);
            top.location.href = '/';
            },
        error: function (xhr) {
            logout();
        }
    });
}

function logout() {
    setCookie('tokenAccess', 0, 0);
    top.location.href = "/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function check_api_session()
{
    $.get({
        url: base_url + '/api/me?' + new Date().getTime(),
        headers: {
            'Authorization': 'Bearer ' + getCookie('tokenAccess')
        },
        success: function (data) {
            user = data.user;
            loggedActions();
        },
        error: function (data) {
            top.location.href = '/login.html';
        },
    });
}

function loggedActions()
{
    $('#usuarioNombre').html(user.username);

    if ($('#userData').length > 0) {
        getUserData();
    }

    if ($('#profileForm').length > 0) {
        profileLoadUserData();
        getCiudadForm();
    }
}

function profileLoadUserData()
{
    $('#profileForm [name="email"]').val(user.email);
    $('#profileForm [name="nombre"]').val(user.nombre);
    $('#profileForm [name="apellido"]').val(user.apellido);
    $('#profileForm [name="edad"]').val(user.edad);
    $('#profileForm [name="ciudad"]').val(user.ciudadId).change();
}