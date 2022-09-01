(window.webpackJsonp=window.webpackJsonp||[]).push([[22],{294:function(t,a,s){"use strict";s.r(a);var e=s(16),n=Object(e.a)({},(function(){var t=this,a=t._self._c;return a("ContentSlotsDistributor",{attrs:{"slot-key":t.$parent.slotKey}},[a("h1",{attrs:{id:"handling-failed-payments"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#handling-failed-payments"}},[t._v("#")]),t._v(" Handling failed payments")]),t._v(" "),a("p",[t._v("Cashier automatically handles failed payments for you. In case the payment was for a subscription, the subscription gets cancelled immediately.")]),t._v(" "),a("p",[t._v("For the best customer experience, listen for the "),a("code",[t._v("OrderPaymentFailed")]),t._v(" and "),a("code",[t._v("OrderPaymentFailedDueToInvalidMandate")]),t._v(" events to notify the user and ask to "),a("RouterLink",{attrs:{to:"/06-customer.html#updating-customer-payment-method"}},[t._v("update the payment method")]),t._v(" before retrying the payment.")],1),t._v(" "),a("p",[t._v("Here's how to retry a payment:")]),t._v(" "),a("div",{staticClass:"language-php extra-class"},[a("pre",{pre:!0,attrs:{class:"language-php"}},[a("code",[a("span",{pre:!0,attrs:{class:"token keyword"}},[t._v("use")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token package"}},[t._v("App"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("Models"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("User")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),a("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$user")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token class-name class-name-fully-qualified static-context"}},[t._v("App"),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("\\")]),t._v("User")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("::")]),a("span",{pre:!0,attrs:{class:"token function"}},[t._v("find")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),a("span",{pre:!0,attrs:{class:"token number"}},[t._v("1")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n\n"),a("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$order")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("=")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$user")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("->")]),a("span",{pre:!0,attrs:{class:"token property"}},[t._v("orders")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("->")]),a("span",{pre:!0,attrs:{class:"token function"}},[t._v("find")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),a("span",{pre:!0,attrs:{class:"token number"}},[t._v("1")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),t._v(" "),a("span",{pre:!0,attrs:{class:"token comment"}},[t._v("// id of the failed order;")]),t._v("\n"),a("span",{pre:!0,attrs:{class:"token variable"}},[t._v("$order")]),a("span",{pre:!0,attrs:{class:"token operator"}},[t._v("->")]),a("span",{pre:!0,attrs:{class:"token function"}},[t._v("retryNow")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v("(")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(")")]),a("span",{pre:!0,attrs:{class:"token punctuation"}},[t._v(";")]),t._v("\n")])])]),a("h2",{attrs:{id:"subscriptions-and-failed-payments"}},[a("a",{staticClass:"header-anchor",attrs:{href:"#subscriptions-and-failed-payments"}},[t._v("#")]),t._v(" Subscriptions and failed payments")]),t._v(" "),a("p",[t._v("Subscriptions are active until Cashier gets notified by Mollie that a payment related to that subscription has failed. On a successful payment retry, the subscription will be reactivated, continuing the billing cycle as it was before.")])])}),[],!1,null,null,null);a.default=n.exports}}]);