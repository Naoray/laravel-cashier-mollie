(window.webpackJsonp=window.webpackJsonp||[]).push([[20],{385:function(a,t,s){"use strict";s.r(t);var e=s(48),n=Object(e.a)({},(function(){var a=this,t=a.$createElement,s=a._self._c||t;return s("ContentSlotsDistributor",{attrs:{"slot-key":a.$parent.slotKey}},[s("h1",{attrs:{id:"upgrade-guide"}},[s("a",{staticClass:"header-anchor",attrs:{href:"#upgrade-guide"}},[a._v("#")]),a._v(" Upgrade Guide")]),a._v(" "),s("p",[a._v("##Upgrading To 2.0 From 1.x")]),a._v(" "),s("div",{staticClass:"language-bash extra-class"},[s("pre",{pre:!0,attrs:{class:"language-bash"}},[s("code",[s("span",{pre:!0,attrs:{class:"token function"}},[a._v("composer")]),a._v(" require laravel/cashier-mollie "),s("span",{pre:!0,attrs:{class:"token string"}},[a._v('"^2.0"')]),a._v("\n")])])]),s("p",[a._v("Once you have pulled in the package:")]),a._v(" "),s("ol",[s("li",[s("p",[a._v("Run "),s("code",[a._v("php artisan cashier:update")]),a._v(" (Optional, for safety update, you can use "),s("code",[a._v("php artisan cashier:update --maintenance")]),a._v(". That will put the application in maintenance mode while the update process is in progress, lock webhooks and cashier::run)")])]),a._v(" "),s("li",[s("p",[a._v("After that, remove cashier_backup_orders table, if everything is ok.")])]),a._v(" "),s("li",[s("p",[a._v("Use "),s("code",[a._v("quantity")]),a._v(" in "),s("code",[a._v("AddBalance")]),a._v(" and "),s("code",[a._v("AddGenericOrderItem")])])])]),a._v(" "),s("ul",[s("li",[a._v("Find "),s("code",[a._v("AddGenericOrderItem::create([...])")]),a._v(" usage and add "),s("code",[a._v("$quantity")]),a._v(". The actual constructor is")])]),a._v(" "),s("div",{staticClass:"language-php extra-class"},[s("pre",{pre:!0,attrs:{class:"language-php"}},[s("code",[s("span",{pre:!0,attrs:{class:"token keyword"}},[a._v("public")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword"}},[a._v("function")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token function"}},[a._v("__construct")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v("(")]),s("span",{pre:!0,attrs:{class:"token class-name type-declaration"}},[a._v("Model")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$owner")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token class-name type-declaration"}},[a._v("Money")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$unitPrice")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword type-hint"}},[a._v("int")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$quantity")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword type-hint"}},[a._v("string")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$description")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword type-hint"}},[a._v("int")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$roundingMode")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token operator"}},[a._v("=")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token class-name static-context"}},[a._v("Money")]),s("span",{pre:!0,attrs:{class:"token operator"}},[a._v("::")]),s("span",{pre:!0,attrs:{class:"token constant"}},[a._v("ROUND_HALF_UP")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(")")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v("{")]),s("span",{pre:!0,attrs:{class:"token operator"}},[a._v("...")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v("}")]),a._v("\n")])])]),s("ul",[s("li",[a._v("Find "),s("code",[a._v("AddBalance::create([...])")]),a._v(" usage and add "),s("code",[a._v("$quantity")]),a._v(". The actual constructor is")])]),a._v(" "),s("div",{staticClass:"language-php extra-class"},[s("pre",{pre:!0,attrs:{class:"language-php"}},[s("code",[s("span",{pre:!0,attrs:{class:"token keyword"}},[a._v("public")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword"}},[a._v("function")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token function"}},[a._v("__construct")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v("(")]),s("span",{pre:!0,attrs:{class:"token class-name type-declaration"}},[a._v("Model")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$owner")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token class-name type-declaration"}},[a._v("Money")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$subtotal")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword type-hint"}},[a._v("int")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$quantity")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(",")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token keyword type-hint"}},[a._v("string")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token variable"}},[a._v("$description")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v(")")]),a._v(" "),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v("{")]),s("span",{pre:!0,attrs:{class:"token operator"}},[a._v("...")]),s("span",{pre:!0,attrs:{class:"token punctuation"}},[a._v("}")]),a._v("\n")])])])])}),[],!1,null,null,null);t.default=n.exports}}]);