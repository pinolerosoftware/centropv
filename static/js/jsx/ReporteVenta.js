class Venta extends React.Component {
    render() {
        return React.createElement(
            "tr",
            null,
            React.createElement(
                "td",
                null,
                this.props.venta.cliente
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.venta.subtotal
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.venta.iva
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.venta.total
            ),
            React.createElement(
                "td",
                null,
                this.props.venta.cancelada
            )
        );
    }
}

class Ventas extends React.Component {
    constructor(props) {
        super(props);
        this.onClickBuscar = this.onClickBuscar.bind(this);
        this.state = { ventas: [], estadoBotonDescarga: true };
    }
    onClickBuscar(e) {
        let self = this;
        $.post("/reportes/getVenta", { fechaInicio: this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value }).done(function (data) {
            if (JSON.parse(data).length > 0) self.setState({ ventas: JSON.parse(data), estadoBotonDescarga: false });else self.setState({ ventas: JSON.parse(data), estadoBotonDescarga: true });
        }).fail(function (data) {
            console.log('error del server');
        });
    }
    render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaInicio" },
                        "Fecha Inicio"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaInicio", readOnly: "readonly", className: "form-control form_datetime", id: "FechaInicio", placeholder: "Seleccionar fecha de inicio" })
                ),
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaFin" },
                        "Fecha Fin"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaFin", readOnly: "readonly", className: "form-control form_datetime", id: "FechaFin", placeholder: "Seleccionar fecha fin" })
                )
            ),
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "center" },
                    React.createElement(
                        "button",
                        { onClick: this.onClickBuscar, type: "submit", className: "btn btn-primary" },
                        "Buscar"
                    ),
                    React.createElement(
                        "a",
                        { href: "/reportes/dVenta", onClick: this.onClickDescarga, disabled: this.state.estadoBotonDescarga, type: "button", className: "btn btn-primary pull-right" },
                        "Descargar"
                    )
                )
            ),
            React.createElement(
                "div",
                { className: "row margen-tabla" },
                React.createElement(
                    "div",
                    { className: "table-responsive" },
                    React.createElement(
                        "table",
                        { className: "table table-bordered" },
                        React.createElement(
                            "thead",
                            null,
                            React.createElement(
                                "tr",
                                null,
                                React.createElement(
                                    "th",
                                    null,
                                    "Cliente"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "SubTotal"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Iva"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Total"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Cancelada"
                                )
                            )
                        ),
                        React.createElement(
                            "tbody",
                            null,
                            this.state.ventas.map(item => React.createElement(Venta, { venta: item }))
                        )
                    )
                )
            )
        );
    }
}

class Producto extends React.Component {
    render() {
        return React.createElement(
            "tr",
            null,
            React.createElement(
                "td",
                null,
                this.props.producto.descripcion
            ),
            React.createElement(
                "td",
                null,
                this.props.producto.cantidad
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.producto.monto
            )
        );
    }
}

class Productos extends React.Component {
    constructor(props) {
        super(props);
        this.onClickBuscar = this.onClickBuscar.bind(this);
        this.state = { productos: [], estadoBotonDescarga: true };
    }

    onClickBuscar(e) {
        let self = this;
        $.post("/reportes/getVentaProductos", { fechaInicio: this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value }).done(function (data) {
            if (JSON.parse(data).length > 0) self.setState({ productos: JSON.parse(data), estadoBotonDescarga: false });else self.setState({ productos: JSON.parse(data), estadoBotonDescarga: true });
        }).fail(function (data) {
            console.log('error del server');
        });
    }
    render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaInicio" },
                        "Fecha Inicio"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaInicio", readOnly: "readonly", className: "form-control form_datetime", id: "FechaInicio", placeholder: "Seleccionar fecha de inicio" })
                ),
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaFin" },
                        "Fecha Fin"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaFin", readOnly: "readonly", className: "form-control form_datetime", id: "FechaFin", placeholder: "Seleccionar fecha fin" })
                )
            ),
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "center" },
                    React.createElement(
                        "button",
                        { onClick: this.onClickBuscar, type: "submit", className: "btn btn-primary" },
                        "Buscar"
                    )
                ),
                React.createElement(
                    "a",
                    { href: "/reportes/dVentaProductos", onClick: this.onClickDescarga, disabled: this.state.estadoBotonDescarga, type: "button", className: "btn btn-primary pull-right" },
                    "Descargar"
                )
            ),
            React.createElement(
                "div",
                { className: "row margen-tabla" },
                React.createElement(
                    "div",
                    { className: "table-responsive" },
                    React.createElement(
                        "table",
                        { className: "table table-bordered" },
                        React.createElement(
                            "thead",
                            null,
                            React.createElement(
                                "tr",
                                null,
                                React.createElement(
                                    "th",
                                    null,
                                    "Producto"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Cantidad"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Monto"
                                )
                            )
                        ),
                        React.createElement(
                            "tbody",
                            null,
                            this.state.productos.map(item => React.createElement(Producto, { producto: item }))
                        )
                    )
                )
            )
        );
    }
}

class Usuario extends React.Component {
    render() {
        return React.createElement(
            "tr",
            null,
            React.createElement(
                "td",
                null,
                this.props.producto.usuario
            ),
            React.createElement(
                "td",
                null,
                this.props.producto.cantidad
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.producto.monto
            )
        );
    }
}
class Usuarios extends React.Component {
    constructor(props) {
        super(props);
        this.onClickBuscar = this.onClickBuscar.bind(this);
        this.state = { usuarios: [], estadoBotonDescarga: true };
    }

    onClickBuscar(e) {
        let self = this;
        $.post("/reportes/getVentaUsuarios", { fechaInicio: this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value }).done(function (data) {
            if (JSON.parse(data).length > 0) self.setState({ usuarios: JSON.parse(data), estadoBotonDescarga: false });else self.setState({ usuarios: JSON.parse(data), estadoBotonDescarga: true });
        }).fail(function (data) {
            console.log('error del server');
        });
    }
    render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaInicio" },
                        "Fecha Inicio"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaInicio", readOnly: "readonly", className: "form-control form_datetime", id: "FechaInicio", placeholder: "Seleccionar fecha de inicio" })
                ),
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaFin" },
                        "Fecha Fin"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaFin", readOnly: "readonly", className: "form-control form_datetime", id: "FechaFin", placeholder: "Seleccionar fecha fin" })
                )
            ),
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "center" },
                    React.createElement(
                        "button",
                        { onClick: this.onClickBuscar, type: "submit", className: "btn btn-primary" },
                        "Buscar"
                    )
                ),
                React.createElement(
                    "a",
                    { href: "/reportes/dVentaUsuarios", disabled: this.state.estadoBotonDescarga, type: "button", className: "btn btn-primary pull-right" },
                    "Descargar"
                )
            ),
            React.createElement(
                "div",
                { className: "row margen-tabla" },
                React.createElement(
                    "div",
                    { className: "table-responsive" },
                    React.createElement(
                        "table",
                        { className: "table table-bordered" },
                        React.createElement(
                            "thead",
                            null,
                            React.createElement(
                                "tr",
                                null,
                                React.createElement(
                                    "th",
                                    null,
                                    "Usuarios"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Cantidad de venta"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Monto de ventas"
                                )
                            )
                        ),
                        React.createElement(
                            "tbody",
                            null,
                            this.state.usuarios.map(item => React.createElement(Usuario, { producto: item }))
                        )
                    )
                )
            )
        );
    }
}

class Cliente extends React.Component {
    render() {
        return React.createElement(
            "tr",
            null,
            React.createElement(
                "td",
                null,
                this.props.cliente.cliente
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.cliente.subtotal
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.cliente.iva
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.cliente.total
            )
        );
    }
}

class Clientes extends React.Component {
    constructor(props) {
        super(props);
        this.onClickBuscar = this.onClickBuscar.bind(this);
        this.state = { clientes: [], estadoBotonDescarga: true };
    }

    onClickBuscar(e) {
        let self = this;
        $.post("/reportes/getVentaClientes", { fechaInicio: this.refs.fechaInicio.value, fechaFin: this.refs.fechaFin.value }).done(function (data) {
            if (JSON.parse(data).length > 0) self.setState({ clientes: JSON.parse(data), estadoBotonDescarga: false });else self.setState({ clientes: JSON.parse(data), estadoBotonDescarga: true });
        }).fail(function (data) {
            console.log('error del server');
        });
    }
    render() {
        return React.createElement(
            "div",
            null,
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaInicio" },
                        "Fecha Inicio"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaInicio", readOnly: "readonly", className: "form-control form_datetime", id: "FechaInicio", placeholder: "Seleccionar fecha de inicio" })
                ),
                React.createElement(
                    "div",
                    { className: "form-group col-xl-6 col-lg-6 col-md-6 col-sm-6 col-xs-6" },
                    React.createElement(
                        "label",
                        { "for": "FechaFin" },
                        "Fecha Fin"
                    ),
                    React.createElement("input", { type: "text", ref: "fechaFin", readOnly: "readonly", className: "form-control form_datetime", id: "FechaFin", placeholder: "Seleccionar fecha fin" })
                )
            ),
            React.createElement(
                "div",
                { className: "row" },
                React.createElement(
                    "div",
                    { className: "center" },
                    React.createElement(
                        "button",
                        { onClick: this.onClickBuscar, type: "submit", className: "btn btn-primary" },
                        "Buscar"
                    )
                ),
                React.createElement(
                    "a",
                    { href: "/reportes/dVentaClientes", disabled: this.state.estadoBotonDescarga, type: "button", className: "btn btn-primary pull-right" },
                    "Descargar"
                )
            ),
            React.createElement(
                "div",
                { className: "row margen-tabla" },
                React.createElement(
                    "div",
                    { className: "table-responsive" },
                    React.createElement(
                        "table",
                        { className: "table table-bordered" },
                        React.createElement(
                            "thead",
                            null,
                            React.createElement(
                                "tr",
                                null,
                                React.createElement(
                                    "th",
                                    null,
                                    "Clientes"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "SubTotal"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Iva"
                                ),
                                React.createElement(
                                    "th",
                                    null,
                                    "Total"
                                )
                            )
                        ),
                        React.createElement(
                            "tbody",
                            null,
                            this.state.clientes.map(item => React.createElement(Cliente, { cliente: item }))
                        )
                    )
                )
            )
        );
    }
}

ReactDOM.render(React.createElement(Ventas, null), document.getElementById('content-venta'));
ReactDOM.render(React.createElement(Productos, null), document.getElementById('content-productos'));
ReactDOM.render(React.createElement(Usuarios, null), document.getElementById('content-Usuarios'));
ReactDOM.render(React.createElement(Clientes, null), document.getElementById('content-Clientes'));
$(".form_datetime").datetimepicker({ language: 'es', format: 'dd-mm-yyyy', autoclose: true, startView: 2, minView: 2, maxView: 2 });