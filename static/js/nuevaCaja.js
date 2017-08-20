class Producto extends React.Component {
    constructor(props) {
        super(props);
        this.clickProducto = this.clickProducto.bind(this);
    }
    clickProducto() {
        this.props.onClickProducto(this.props.producto, this.props.index);
    }
    render() {
        return React.createElement(
            "tr",
            { onClick: this.clickProducto },
            React.createElement(
                "td",
                null,
                this.props.producto.descripcion
            ),
            React.createElement(
                "td",
                null,
                "C$ ",
                this.props.producto.precio
            ),
            React.createElement(
                "td",
                null,
                this.props.producto.cantidad
            )
        );
    }
}

class ProductoVenta extends React.Component {
    constructor(props) {
        super(props);
        this.onClickProductoVenta = this.onClickProductoVenta.bind(this);
    }
    onClickProductoVenta() {
        this.props.onClickProductoVenta(this.props.producto);
    }
    render() {
        return React.createElement(
            "a",
            { className: "list-group-item list-group-item-action", onClick: this.onClickProductoVenta },
            this.props.producto.descripcion,
            React.createElement(
                "span",
                { className: "badge badge-default badge-pill" },
                this.props.producto.cantidad
            ),
            React.createElement(
                "span",
                { className: "badge badge-default badge-pill" },
                "C$ ",
                this.props.producto.monto
            )
        );
    }
}

class Productos extends React.Component {
    constructor(props) {
        super(props);
        this.onClickProducto = this.onClickProducto.bind(this);
        this.onChangeFiltro = this.onChangeFiltro.bind(this);
        this.state = { productos: [], productoFiltro: [] };
    }
    componentDidMount() {
        $.ajax({
            url: '/caja/listaProducto',
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({ productos: data, productoFiltro: data });
            }.bind(this)
        });
    }
    onClickProducto(producto, index) {
        this.props.onClickProducto(producto, index);
    }
    onChangeFiltro(event) {
        console.log(event);
        var productoTemporal = this.state.productoFiltro;
        productoTemporal = productoTemporal.filter(function (item) {
            return item.descripcion.toLowerCase().search(event.target.value.toLowerCase()) != -1;
        });
        this.setState({ productos: productoTemporal });
    }
    render() {
        return React.createElement(
            "div",
            { className: "col-lg-8 col-sm-8" },
            React.createElement(
                "div",
                { className: "card" },
                React.createElement(
                    "div",
                    { className: "header" },
                    React.createElement(
                        "h4",
                        { className: "title" },
                        "Lista de productos"
                    )
                ),
                React.createElement(
                    "div",
                    { className: "content" },
                    React.createElement(
                        "div",
                        { className: "form-group" },
                        React.createElement("input", { type: "text", className: "form-control border-input", ref: "productoFiltro", placeholder: "Buscar", name: "categoria", onChange: this.onChangeFiltro })
                    ),
                    React.createElement(
                        "div",
                        { className: "table-responsive table-full-width" },
                        React.createElement(
                            "table",
                            { className: "table table-striped" },
                            React.createElement(
                                "thead",
                                null,
                                React.createElement(
                                    "tr",
                                    null,
                                    React.createElement(
                                        "th",
                                        null,
                                        "Descripci\xF3n"
                                    ),
                                    React.createElement(
                                        "th",
                                        null,
                                        "Precio"
                                    ),
                                    React.createElement(
                                        "th",
                                        null,
                                        "Cantidad"
                                    )
                                )
                            ),
                            React.createElement(
                                "tbody",
                                null,
                                this.state.productos.map((producto, index) => React.createElement(Producto, { key: index, index: index, producto: producto, onClickProducto: this.onClickProducto }))
                            )
                        )
                    )
                )
            )
        );
    }
}

class Cliente extends React.Component {
    constructor(props) {
        super(props);
        this.onClickCliente = this.onClickCliente.bind(this);
    }
    onClickCliente() {
        this.props.onClickCliente(this.props.index);
    }
    render() {
        return React.createElement(
            "tr",
            { onClick: this.onClickCliente },
            React.createElement(
                "td",
                null,
                this.props.cliente.firstname
            ),
            React.createElement(
                "td",
                null,
                this.props.cliente.lastname
            ),
            React.createElement(
                "td",
                null,
                this.props.cliente.business
            )
        );
    }
}

class Clientes extends React.Component {
    constructor(props) {
        super(props);
        this.onChangeFiltro = this.onChangeFiltro.bind(this);
        this.onClickCliente = this.onClickCliente.bind(this);
        this.state = { clientes: [], clientesFiltro: [] };
    }
    componentDidMount() {
        $.ajax({
            url: '/caja/listaClientes',
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({ clientes: data, clientesFiltro: data });
            }.bind(this)
        });
    }
    onChangeFiltro() {
        var clientesTemporales = [];
        var filtro1 = 0;
        var filtro2 = 0;
        var filtro3 = 0;
        for (var i = 0; i < this.state.clientesFiltro.length; i++) {
            filtro1 = this.state.clientesFiltro[i].firstname.toLowerCase().search(this.refs.nombres.value.toLowerCase());
            filtro2 = this.state.clientesFiltro[i].lastname.toLowerCase().search(this.refs.apellidos.value.toLowerCase());
            filtro3 = this.state.clientesFiltro[i].business.toLowerCase().search(this.refs.empresas.value.toLowerCase());
            if (filtro1 != -1 & filtro2 != -1 & filtro3 != -1) {
                clientesTemporales.push(this.state.clientesFiltro[i]);
            }
        }
        this.setState({ clientes: clientesTemporales });
    }
    onClickCliente(index) {
        this.props.onClickCliente(this.state.clientes[index]);
    }
    render() {
        return React.createElement(
            "table",
            { className: "table table-striped" },
            React.createElement(
                "thead",
                null,
                React.createElement(
                    "tr",
                    null,
                    React.createElement(
                        "th",
                        null,
                        "Nombres"
                    ),
                    React.createElement(
                        "th",
                        null,
                        "Apellidos"
                    ),
                    React.createElement(
                        "th",
                        null,
                        "Categoria"
                    )
                ),
                React.createElement(
                    "tr",
                    null,
                    React.createElement(
                        "th",
                        null,
                        React.createElement("input", { type: "text", ref: "nombres", className: "form-control border-input", placeholder: "Filtro por nombre", onChange: this.onChangeFiltro })
                    ),
                    React.createElement(
                        "th",
                        null,
                        React.createElement("input", { type: "text", ref: "apellidos", className: "form-control border-input", placeholder: "Filtro por apellidos", onChange: this.onChangeFiltro })
                    ),
                    React.createElement(
                        "th",
                        null,
                        React.createElement("input", { type: "text", ref: "empresas", className: "form-control border-input", placeholder: "Filtro por empresa", onChange: this.onChangeFiltro })
                    )
                )
            ),
            React.createElement(
                "tbody",
                null,
                this.state.clientes.map((cliente, index) => React.createElement(Cliente, { key: index, index: index, cliente: cliente, onClickCliente: this.onClickCliente }))
            )
        );
    }
}

class Caja extends React.Component {
    constructor(props) {
        super(props);
        this.onClickProducto = this.onClickProducto.bind(this);
        this.onClickProductoVenta = this.onClickProductoVenta.bind(this);
        this.onClickFacturar = this.onClickFacturar.bind(this);
        this.onClickCredito = this.onClickCredito.bind(this);
        this.onClickBuscarClienteCredito = this.onClickBuscarClienteCredito.bind(this);
        this.onClickCancelarBusquedaClienteCredito = this.onClickCancelarBusquedaClienteCredito.bind(this);
        this.nuevaVenta = this.nuevaVenta.bind(this);
        this.state = {
            ventaProductos: [],
            productos: [],
            subTotal: 0.00,
            iva: 0.00,
            total: 0.00,
            btnCreditoText: 'Credito',
            btnFacturaText: 'Facturar',
            btnEstado: true
        };
    }
    componentDidMount() {
        $.ajax({
            url: '/configuracion/ivaCaja',
            dataType: 'json',
            cache: false,
            success: function (data) {
                this.setState({ confIva: data[0] });
            }.bind(this)
        });
    }
    onClickProducto(producto, index) {
        let ventasTemp = this.state.ventaProductos;
        let encontrado = false;
        let total = parseFloat(0.00);
        let montoIva = parseFloat(this.state.confIva.porcentaje / 100);
        let totalSubTotal = 0;
        let totalIva = 0;
        for (var i = 0; i < ventasTemp.length; i++) {
            if (ventasTemp[i].ProductID == producto.ProductID) {
                ventasTemp[i].cantidad++;
                ventasTemp[i].monto = parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad);
                totalSubTotal = totalSubTotal + ventasTemp[i].monto;
                if (producto.taxFree == "1") {
                    totalIva = totalIva + ventasTemp[i].monto * montoIva;
                    ventasTemp[i].monto = ventasTemp[i].monto + ventasTemp[i].monto * montoIva;
                }
                encontrado = true;
            } else {
                if (ventasTemp[i].taxFree == "1") {
                    totalIva = totalIva + ventasTemp[i].monto * montoIva;
                }
                totalSubTotal = totalSubTotal + ventasTemp[i].monto;
            }
        }
        if (encontrado == false) {
            let calculoMonto = parseFloat(producto.precio);
            totalSubTotal = totalSubTotal + calculoMonto;
            if (producto.taxFree == "1") {
                totalIva = totalIva + parseFloat(producto.precio) * montoIva;
                calculoMonto = calculoMonto + parseFloat(producto.precio) * montoIva;
            }
            ventasTemp.push({
                ProductID: producto.ProductID,
                descripcion: producto.descripcion,
                precio: producto.precio,
                cantidad: 1,
                monto: calculoMonto,
                taxFree: producto.taxFree
            });
        }
        total = totalIva + totalSubTotal;
        if (this.state.btnEstado) this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total, btnEstado: false });else this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total });
    }
    onClickProductoVenta(productoVenta) {
        let ventasTemp = this.state.ventaProductos;
        let eliminar = false;
        let indexEliminar;
        let total = parseFloat(0.00);
        let montoIva = parseFloat(this.state.confIva.porcentaje / 100);
        let totalSubTotal = 0;
        let totalIva = 0;
        for (let i = 0; i < ventasTemp.length; i++) {
            if (ventasTemp[i].ProductID == productoVenta.ProductID) {
                if (ventasTemp[i].cantidad > 1) {
                    ventasTemp[i].cantidad--;
                    ventasTemp[i].monto = parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad);
                    totalSubTotal = totalSubTotal + ventasTemp[i].monto;
                    if (productoVenta.taxFree == "1") {
                        totalIva = totalIva + ventasTemp[i].monto * montoIva;
                        ventasTemp[i].monto = ventasTemp[i].monto + ventasTemp[i].monto * montoIva;
                    }
                } else {
                    eliminar = true;
                    indexEliminar = i;
                }
            } else {
                totalSubTotal = totalSubTotal + parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad);
                if (ventasTemp[i].taxFree == "1") {
                    totalIva = totalIva + parseFloat(ventasTemp[i].precio) * parseFloat(ventasTemp[i].cantidad) * montoIva;
                }
            }
        }
        if (eliminar == true) {
            ventasTemp.splice(indexEliminar, 1);
        }
        total = totalIva + totalSubTotal;
        if (ventasTemp.length == 0) this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total, btnEstado: true });else this.setState({ ventaProductos: ventasTemp, subTotal: totalSubTotal, iva: totalIva, total: total });
    }
    onClickFacturar() {
        if (this.state.ventaProductos.length > 0) {
            this.setState({ btnFacturaText: 'Guardando...', btnEstado: true });
            var self = this;
            $.post("/caja/facturar", { nuevaVenta: this.state.ventaProductos }).done(function (data) {
                if (data != 0) {
                    self.nuevaVenta();
                    self.setState({ btnFacturaText: 'Facturar', btnEstado: false });
                }
            }).fail(function (data) {
                console.log('error del server');
                console.log(data);
                self.setState({ btnFacturaText: 'Facturar', btnEstado: false });
            });
        }
    }
    onClickCredito(clie) {
        if (this.state.ventaProductos.length > 0) {
            this.setState({ btnCreditoText: 'Guardando...', btnEstado: true });
            $('#ventanaModal').fadeOut();
            var self = this;
            $.post("/caja/facturarCredito", { nuevaVenta: this.state.ventaProductos, cliente: clie }).done(function (data) {
                if (data != 0) {
                    //$('.close').trigger('click');
                    self.nuevaVenta();
                    self.setState({ btnCreditoText: 'Credito', btnEstado: false });
                }
            }).fail(function (data) {
                console.log('error del server');
                self.setState({ btnCreditoText: 'Credito', btnEstado: false });
            });
        }
    }
    onClickBuscarClienteCredito() {
        this.setState({ btnCreditoText: 'Cargando...' });
        $('#ventanaModal').fadeIn();
    }
    onClickCancelarBusquedaClienteCredito() {
        this.setState({ btnCreditoText: 'Credito' });
        $('#ventanaModal').fadeOut();
    }
    nuevaVenta() {
        this.setState({ ventaProductos: [], subTotal: 0.00, iva: 0.00, total: 0.00 });
    }
    render() {
        return React.createElement(
            "div",
            null,
            React.createElement(Productos, { onClickProducto: this.onClickProducto }),
            React.createElement(
                "div",
                { className: "col-lg-4 col-sm-4" },
                React.createElement(
                    "div",
                    { className: "card" },
                    React.createElement(
                        "div",
                        { className: "header" },
                        React.createElement(
                            "div",
                            { className: "heading-total" },
                            React.createElement(
                                "button",
                                { type: "button", className: "btn btn-primary btn-sm btn-caja", disabled: this.state.btnEstado, onClick: this.onClickFacturar },
                                this.state.btnFacturaText
                            ),
                            React.createElement(
                                "button",
                                { type: "button", className: "btn btn-primary pull-right btn-sm btn-caja", disabled: this.state.btnEstado, onClick: this.onClickBuscarClienteCredito },
                                this.state.btnCreditoText,
                                " "
                            )
                        )
                    ),
                    React.createElement(
                        "div",
                        { className: "content" },
                        React.createElement(
                            "section",
                            { className: "resumen" },
                            React.createElement(
                                "div",
                                { className: "list-group" },
                                this.state.ventaProductos.map((producto, index) => React.createElement(ProductoVenta, { key: index, index: index, producto: producto, onClickProductoVenta: this.onClickProductoVenta }))
                            )
                        ),
                        React.createElement("hr", null),
                        React.createElement(
                            "div",
                            { className: "row" },
                            React.createElement(
                                "div",
                                { className: "col-xs-12" },
                                React.createElement(
                                    "lable",
                                    null,
                                    React.createElement(
                                        "strong",
                                        null,
                                        "SubTotal : ",
                                        React.createElement(
                                            "span",
                                            { className: "pull-right" },
                                            "C$ ",
                                            this.state.subTotal
                                        )
                                    )
                                )
                            )
                        ),
                        React.createElement(
                            "div",
                            { className: "row" },
                            React.createElement(
                                "div",
                                { className: "col-xs-12" },
                                React.createElement(
                                    "lable",
                                    null,
                                    React.createElement(
                                        "strong",
                                        null,
                                        "Iva : ",
                                        React.createElement(
                                            "span",
                                            { className: "pull-right" },
                                            "C$ ",
                                            this.state.iva
                                        )
                                    )
                                )
                            )
                        ),
                        React.createElement(
                            "div",
                            { className: "row" },
                            React.createElement(
                                "div",
                                { className: "col-xs-12" },
                                React.createElement(
                                    "lable",
                                    null,
                                    React.createElement(
                                        "strong",
                                        null,
                                        "Total : ",
                                        React.createElement(
                                            "span",
                                            { className: "pull-right" },
                                            "C$ ",
                                            this.state.total
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            ),
            React.createElement(
                "div",
                { className: "ventanaModal", id: "ventanaModal" },
                React.createElement(
                    "div",
                    { className: "ventanaModal-content" },
                    React.createElement(
                        "div",
                        { className: "ventanaModal-header" },
                        React.createElement(
                            "button",
                            { type: "button", className: "close", onClick: this.onClickCancelarBusquedaClienteCredito },
                            React.createElement(
                                "span",
                                { "aria-hidden": "true" },
                                "\xD7"
                            )
                        ),
                        React.createElement(
                            "h4",
                            { className: "ventanaModal-title" },
                            "Lista de Clientes"
                        )
                    ),
                    React.createElement(
                        "div",
                        { className: "ventanaModal-body" },
                        React.createElement(Clientes, { onClickCliente: this.onClickCredito })
                    )
                )
            )
        );
    }
}

ReactDOM.render(React.createElement(Caja, null), document.getElementById('caja2'));