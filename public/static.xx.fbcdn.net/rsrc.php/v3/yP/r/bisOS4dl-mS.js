; /*FB_PKG_DELIM*/

__d("BdPdcSignalsFalcoEvent", ["FalcoLoggerInternal", "getFalcoLogPolicy_DO_NOT_USE"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = c("getFalcoLogPolicy_DO_NOT_USE")("1743095");
    b = d("FalcoLoggerInternal").create("bd_pdc_signals", a);
    e = b;
    g["default"] = e
}), 98);
__d("BotDetection_SignalFlags", [], (function(a, b, c, d, e, f) {
    a = Object.freeze({
        ACTIVE: 1,
        DYNAMIC: 2,
        BIOMETRIC: 4,
        DEPRECATED: 8,
        WEB: 16,
        IOS_NATIVE: 32,
        ANDROID_NATIVE: 64,
        EQUAL_BY_VALUE: 128,
        EQUAL_BY_CONTEXT: 256,
        EQUAL_BY_TIMESTAMP: 512,
        SUSPICIOUS_TIER: 1024,
        PARANOID_TIER: 2048,
        RANDOM_SAMPLE_TIER_DEPRECATED: 4096,
        BENIGN_TIER: 262144,
        EMPLOYEES_TIER: 524288,
        BUNDLE: 8192,
        ONSITE: 16384,
        OFFSITE: 32768,
        OFFSITE_SENSITIVE: 65536,
        SENSITIVE: 131072
    });
    f["default"] = a
}), 66);
__d("BDOperationTypedLogger", ["Banzai", "GeneratedLoggerUtils"], (function(a, b, c, d, e, f) {
    "use strict";
    a = function() {
        function a() {
            this.$1 = {}
        }
        var c = a.prototype;
        c.log = function(a) {
            b("GeneratedLoggerUtils").log("logger:BDOperationLoggerConfig", this.$1, b("Banzai").BASIC, a)
        };
        c.logVital = function(a) {
            b("GeneratedLoggerUtils").log("logger:BDOperationLoggerConfig", this.$1, b("Banzai").VITAL, a)
        };
        c.logImmediately = function(a) {
            b("GeneratedLoggerUtils").log("logger:BDOperationLoggerConfig", this.$1, {
                signal: !0
            }, a)
        };
        c.clear = function() {
            this.$1 = {};
            return this
        };
        c.getData = function() {
            return babelHelpers["extends"]({}, this.$1)
        };
        c.updateData = function(a) {
            this.$1 = babelHelpers["extends"]({}, this.$1, a);
            return this
        };
        c.setBdSessionID = function(a) {
            this.$1.bd_session_id = a;
            return this
        };
        c.setComponent = function(a) {
            this.$1.component = a;
            return this
        };
        c.setDurationUs = function(a) {
            this.$1.duration_us = a;
            return this
        };
        c.setExceptionMessage = function(a) {
            this.$1.exception_message = a;
            return this
        };
        c.setExceptionStackTrace = function(a) {
            this.$1.exception_stack_trace = a;
            return this
        };
        c.setExceptionType = function(a) {
            this.$1.exception_type = a;
            return this
        };
        c.setIntValue = function(a) {
            this.$1.int_value = a;
            return this
        };
        c.setLevel = function(a) {
            this.$1.level = a;
            return this
        };
        c.setOperation = function(a) {
            this.$1.operation = a;
            return this
        };
        c.setOperationInfo = function(a) {
            this.$1.operation_info = b("GeneratedLoggerUtils").serializeMap(a);
            return this
        };
        c.setSessionlets = function(a) {
            this.$1.sessionlets = b("GeneratedLoggerUtils").serializeVector(a);
            return this
        };
        return a
    }();
    c = {
        bd_session_id: !0,
        component: !0,
        duration_us: !0,
        exception_message: !0,
        exception_stack_trace: !0,
        exception_type: !0,
        int_value: !0,
        level: !0,
        operation: !0,
        operation_info: !0,
        sessionlets: !0
    };
    f["default"] = a
}), 66);
__d("BDSignalBufferData", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = {};
    b = a;
    f["default"] = b
}), 66);
__d("BDSignalWrapper", ["BDSignalBufferData", "SignalCollectorMap"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function() {
        function a(a, b) {
            this.signalFlags = a, this.signalType = b
        }
        var b = a.prototype;
        b.getSignalCollector = function() {
            return c("SignalCollectorMap").get(this.signalType)
        };
        b.getBufferConfig = function() {
            return c("BDSignalBufferData")[this.signalType]
        };
        return a
    }();
    g["default"] = a
}), 98);
__d("SignalValueContext", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = function() {
        function a(a) {
            this.cn = a
        }
        var b = a.prototype;
        b.getSignalValueContextName = function() {
            return this.cn
        };
        return a
    }();
    f["default"] = a
}), 66);
__d("BDSignalCollectorBase", ["BDSignalBufferData", "SignalValueContext", "regeneratorRuntime"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function() {
        function a(a) {
            this.signalType = a
        }
        var d = a.prototype;
        d.executeSignalCollection = function() {
            throw new Error("Child class responsibility to implement executeSignalCollection")
        };
        d.executeAsyncSignalCollection = function() {
            var a;
            return b("regeneratorRuntime").async(function(c) {
                while (1) switch (c.prev = c.next) {
                    case 0:
                        c.next = 2;
                        return b("regeneratorRuntime").awrap(this.executeSignalCollection());
                    case 2:
                        a = c.sent;
                        return c.abrupt("return", a);
                    case 4:
                    case "end":
                        return c.stop()
                }
            }, null, this)
        };
        a.getSanitizedURI = function() {
            var a = window.location.href,
                b = a.indexOf("?");
            return b < 0 ? a : a.substring(0, b)
        };
        d.getContext = function() {
            return new(c("SignalValueContext"))(a.getSanitizedURI())
        };
        d.throwIfNotInitialized = function() {
            if (!(this.signalType in c("BDSignalBufferData"))) throw new Error("Signal is not intialized")
        };
        return a
    }();
    g["default"] = a
}), 98);
__d("BDLoggingConstants", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = {
        ERROR: "error",
        WARNING: "warning",
        INFO: "info"
    };
    b = {
        KEY_NOT_FOUND: "key_not_found",
        APPEND_SIGNAL: "bd_append_signal",
        APPEND_SIGNAL_FAIL: "bd_append_signal_fail",
        HB_COLLECTED: "append_hb",
        HB_COLLECTION_FAILED: "hb_collection_failed",
        BD_EXCEPTION: "bd_exception",
        SIGNAL_NOT_IMPLEMENTED: "signal_not_implemented",
        SIGNAL_VALUE_NULL: "signal_value_null",
        EMPTY_SIGNAL_CONFIG: "empty_signal_config",
        INVALID_BUFFER_SIZE: "invalid_buffer_size",
        INVALID_DURATION: "invalid_duration",
        SIGNAL_FLAGS_MISSING: "signal_flags_missing",
        DYNAMIC_SIGNAL_COLLECTION_STARTED: "dynamic_signal_collection_started",
        BIOMETRIC_SIGNAL_COLLECTION_STARTED: "biometric_signal_collection_started",
        INVALID_GUID: "invalid_guid",
        INVALID_LENGTH: "invalid_length",
        GET_LOCAL_STORAGE_ERROR: "get_local_storage_error",
        WEB_STORAGE: "web_storage",
        PARSE_CONFIG_ERROR: "parse_config_error",
        HB_START_FAILURE: "hb_start_failure",
        HB_ALREADY_RUNNING: "hb_already_running",
        TRY_RESTARTING_HB: "try_restarting_hb",
        BANZAI_LOG_ERROR: "banzai_log_error"
    };
    c = "JS";
    f.LEVELS = a;
    f.OPERATIONS = b;
    f.COMPONENT_NAME = c
}), 66);
__d("BDOperationLogHelper", ["BDLoggingConstants", "BDOperationTypedLogger", "Random"], (function(a, b, c, d, e, f, g) {
    "use strict";

    function a(a, b, c, e) {
        h(a, d("BDLoggingConstants").LEVELS.INFO, b, c, e)
    }

    function b(a, b, c, e) {
        h(a, d("BDLoggingConstants").LEVELS.WARNING, b, c, e)
    }

    function e(a, b, c, e) {
        h(a, d("BDLoggingConstants").LEVELS.ERROR, b, c, e)
    }

    function h(a, b, e, f, g) {
        f === void 0 && (f = {});
        if (d("Random").coinflip(i(e))) {
            if (f === null) throw new Error("opeartion info null");
            f.source = a;
            new(c("BDOperationTypedLogger"))().setLevel(b).setDurationUs(g).setOperation(e).setComponent(d("BDLoggingConstants").COMPONENT_NAME).setOperationInfo(f).log()
        }
    }

    function i(a) {
        var b = d("BDLoggingConstants").OPERATIONS;
        switch (a) {
            case b.APPEND_SIGNAL:
            case b.HB_COLLECTED:
            case b.GET_LOCAL_STORAGE_ERROR:
            case b.WEB_STORAGE:
            case b.SIGNAL_NOT_IMPLEMENTED:
            case b.BIOMETRIC_SIGNAL_COLLECTION_STARTED:
                return 1e3;
            default:
                return 1
        }
    }
    g.logInfo = a;
    g.logWarning = b;
    g.logError = e;
    g.log = h;
    g.getFlipSamplingByOperation = i
}), 98);
__d("SignalErrorValueTypeDef", [], (function(a, b, c, d, e, f) {
    "use strict";
    var g = "ec",
        h = "en",
        i = "es",
        j = 500;
    a = function() {
        function a(a, b, c) {
            this.$1 = a, this.$2 = b, c != null && (this.$3 = c.substr(0, j))
        }
        var b = a.prototype;
        b.getErrorCode = function() {
            return this.$1
        };
        b.getErrorName = function() {
            return this.$2
        };
        b.getErrorDetails = function() {
            return this.$3
        };
        b.isEqual = function(a) {
            return this.$1 === a.getErrorCode() && this.$3 === a.getErrorDetails() && this.$2 === a.getErrorName()
        };
        b.toJSON = function() {
            var a = {};
            a[g] = this.$1;
            switch (this.$1) {
                case 0:
                    a[h] = this.$2;
                    a[i] = this.$3;
                    break
            }
            return a
        };
        return a
    }();
    f.SignalErrorValueTypeDef = a
}), 66);
__d("SignalValueTypeDef", ["BDLoggingConstants", "BDOperationLogHelper", "SignalErrorValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = "SignalValueTypeDef",
        i = "t",
        j = "ctx",
        k = "v",
        l = "e",
        m = {
            NUMBER: "NUMBER",
            STRING: "STRING",
            BOOLEAN: "BOOLEAN",
            CUSTOM_OBJECT: "CUSTOM_OBJECT",
            INT_ARRAY: "INT_ARRAY",
            TOUCH: "TOUCH",
            MAP: "MAP",
            LIST: "LIST",
            SENSOR: "SENSOR",
            ERROR: "ERROR"
        };
    a = function() {
        function a(a, b, c, d, e) {
            this.$1 = a, this.$2 = b, this.$3 = c, this.$4 = d, this.$5 = e != null ? e : 0
        }
        var b = a.prototype;
        b.getTimeStampMS = function() {
            return this.$1
        };
        b.getSignalContext = function() {
            return this.$2
        };
        b.getSignalValue = function() {
            return this.$3
        };
        b.getSignalValueType = function() {
            return this.$4
        };
        b.isEqual = function(a, b) {
            if (a == null) {
                d("BDOperationLogHelper").logWarning(h, d("BDLoggingConstants").OPERATIONS.SIGNAL_VALUE_NULL);
                return !1
            }
            if (this.getSignalValueType() !== a.getSignalValueType()) return !1;
            if (this.getSignalValueType() === m.ERROR && a.getSignalValueType() === m.ERROR) return this.equalValue(a);
            var c = !1;
            b.has(128) && (c = this.equalValue(a));
            b.has(256) && (c = c && this.getSignalContext() != null && a.getSignalContext() != null && this.getSignalContext().getSignalValueContextName() === a.getSignalContext().getSignalValueContextName());
            b.has(512) && (c = c && Math.abs(this.getTimeStampMS() - a.getTimeStampMS()) <= this.$5);
            return c
        };
        b.equalValue = function(a) {
            if (this.isPrimitiveType()) return this.getSignalValue() === a.getSignalValue();
            throw new Error("Must implement in the subclasses")
        };
        b.toJSON = function(a) {
            var b = {};
            a && (b[i] = this.$1 / 1e3, this.$2 != null && (b[j] = this.$2));
            this.$3 == null ? b[l] = new(d("SignalErrorValueTypeDef").SignalErrorValueTypeDef)(2) : this.addValueOrErrorToJSON(b);
            return b
        };
        b.addValueOrErrorToJSON = function(a) {
            if (this.isPrimitiveType()) a[k] = this.$3;
            else throw new Error("Must implement in the subclasses")
        };
        b.isPrimitiveType = function() {
            switch (typeof this.$3) {
                case "number":
                case "boolean":
                case "string":
                    return !0;
                default:
                    return !1
            }
        };
        return a
    }();
    g.BD_VALUE = k;
    g.BD_ERROR = l;
    g.VALUE_TYPES = m;
    g.SignalValueTypeDef = a
}), 98);
__d("ErrorSignalValueType", ["SignalValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b, c, e) {
            return a.call(this, b, c, e, d("SignalValueTypeDef").VALUE_TYPES.ERROR) || this
        }
        var c = b.prototype;
        c.equalValue = function(a) {
            return this.getSignalValue().isEqual(a.getSignalValue())
        };
        c.addValueOrErrorToJSON = function(a) {
            a[d("SignalValueTypeDef").BD_ERROR] = this.getSignalValue().toJSON()
        };
        return b
    }(d("SignalValueTypeDef").SignalValueTypeDef);
    g["default"] = a
}), 98);
__d("NumberSignalValueType", ["SignalValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b, c, e) {
            return a.call(this, b, c, e, d("SignalValueTypeDef").VALUE_TYPES.NUMBER) || this
        }
        return b
    }(d("SignalValueTypeDef").SignalValueTypeDef);
    g["default"] = a
}), 98);
__d("BDConnectionRTTSignalCollector", ["BDSignalCollectorBase", "ErrorSignalValueType", "NumberSignalValueType", "SignalErrorValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var e = a.prototype;
            e.executeSignalCollection = function() {
                if (navigator.connection != null && navigator.connection.rtt != null) {
                    var a = navigator.connection.rtt;
                    a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), a)
                } else a = new(c("ErrorSignalValueType"))(Date.now(), this.getContext(), new(d("SignalErrorValueTypeDef").SignalErrorValueTypeDef)(3, "navigator.connection.rtt not supported"));
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30004,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("CustomObjectSignalValueType", ["SignalValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b, c, e) {
            return a.call(this, b, c, e, d("SignalValueTypeDef").VALUE_TYPES.CUSTOM_OBJECT) || this
        }
        var c = b.prototype;
        c.equalValue = function(a) {
            return this.getSignalValue().isEqual(a.getSignalValue())
        };
        c.addValueOrErrorToJSON = function(a) {
            a[d("SignalValueTypeDef").BD_VALUE] = this.getSignalValue().toJSON()
        };
        return b
    }(d("SignalValueTypeDef").SignalValueTypeDef);
    g["default"] = a
}), 98);
__d("HeartbeatObject", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = function() {
        function a() {
            this.isAppForeground = !0
        }
        var b = a.prototype;
        b.toJSON = function() {
            return {
                f: this.isAppForeground
            }
        };
        b.isEqual = function(a) {
            return !1
        };
        return a
    }();
    f["default"] = a
}), 66);
__d("BDHeartbeatSignalCollector", ["BDSignalCollectorBase", "CustomObjectSignalValueType", "HeartbeatObject"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = new(c("CustomObjectSignalValueType"))(Date.now(), this.getContext(), new(c("HeartbeatObject"))());
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 38e3,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDBiometricSignalCollectorBase", ["BDSignalCollectorBase", "err"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = "biometric_signal_collected";
    b = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b() {
            return a.apply(this, arguments) || this
        }
        var d = b.prototype;
        d.listenForSignals = function() {
            throw c("err")("Child class responsibility to implement listenForSignals")
        };
        d.executeSignalCollection = function() {
            throw c("err")("executeAsyncSignalCollection and executeSignalCollection should not be called on biometric signals")
        };
        return b
    }(c("BDSignalCollectorBase"));
    g.BIOMETRIC_SIGNAL_COLLECTED_EVENT_NAME = a;
    g.BDBiometricSignalCollectorBase = b
}), 98);
__d("KeyDownUpObject", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = function() {
        function a(a, b) {
            this.action = null, this.key_code = null, this.action = a, this.key_code = b
        }
        var b = a.prototype;
        b.toJSON = function() {
            return {
                action: this.action,
                key_code: this.key_code
            }
        };
        b.isEqual = function(b) {
            return b instanceof a ? this.action === b.action && this.key_code === b.key_code : !1
        };
        return a
    }();
    f["default"] = a
}), 66);
__d("BDKeyDownUpSignalCollector", ["BDBiometricSignalCollectorBase", "CustomObjectSignalValueType", "KeyDownUpObject", "gkx"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var e = a.prototype;
            e.listenForSignals = function() {
                var a = this;
                c("gkx")("1652843") && (document.addEventListener("keydown", function(b) {
                    return a.collectSignals(2)
                }), document.addEventListener("keyup", function(b) {
                    return a.collectSignals(1)
                }))
            };
            e.collectSignals = function(a) {
                a = new(c("CustomObjectSignalValueType"))(Date.now(), this.getContext(), new(c("KeyDownUpObject"))(a, 0));
                a = {
                    signalId: this.signalType,
                    data: {
                        valueOrError: a
                    }
                };
                window.dispatchEvent(new CustomEvent(d("BDBiometricSignalCollectorBase").BIOMETRIC_SIGNAL_COLLECTED_EVENT_NAME, {
                    detail: a
                }))
            };
            return a
        }(d("BDBiometricSignalCollectorBase").BDBiometricSignalCollectorBase),
        i = null,
        j = {
            signalType: 30100,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("StringArrayObject", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = function() {
        function a(a) {
            this.strings = [], this.strings = a
        }
        var b = a.prototype;
        b.toJSON = function() {
            return this.strings
        };
        b.isEqual = function(b) {
            if (!(b instanceof a)) return !1;
            if (b.strings === this.strings) return !0;
            if (b.strings.length !== this.strings.length) return !1;
            for (var c = 0; c < this.strings.length; c++)
                if (this.strings[c] !== b.strings[c]) return !1;
            return !0
        };
        return a
    }();
    f["default"] = a
}), 66);
__d("BDLanguagesSignalCollector", ["BDSignalCollectorBase", "CustomObjectSignalValueType", "StringArrayObject"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = [].concat(navigator.languages);
                a = new(c("CustomObjectSignalValueType"))(Date.now(), this.getContext(), new(c("StringArrayObject"))(a));
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30003,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDMimeTypeCountSignalCollector", ["BDSignalCollectorBase", "NumberSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = navigator.mimeTypes ? navigator.mimeTypes.length : -1;
                a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), a);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30002,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BooleanSignalValueType", ["SignalValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b, c, e) {
            return a.call(this, b, c, e, d("SignalValueTypeDef").VALUE_TYPES.BOOLEAN) || this
        }
        return b
    }(d("SignalValueTypeDef").SignalValueTypeDef);
    g["default"] = a
}), 98);
__d("BDTouchOrMouseSignalCollectorBase", ["BDBiometricSignalCollectorBase", "BDLoggingConstants", "BDOperationLogHelper", "BooleanSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = "BDTouchOrMouseSignalCollectorBase";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b, c, d) {
            var e;
            e = a.call(this, b) || this;
            e.eventsToSubscribe = [];
            e.pauseTimeout = 60 * 60 * 1e3;
            e.eventsToSubscribe = c;
            e.pauseTimeout = d;
            e.handler = function(a) {
                return e.collectSignals(a)
            };
            return e
        }
        var e = b.prototype;
        e.listenForSignals = function() {
            this.collectSignals(), this.addListeners()
        };
        e.addListeners = function() {
            var a = this;
            this.eventsToSubscribe.forEach(function(b) {
                try {
                    document.addEventListener(b, a.handler)
                } catch (a) {
                    d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.BD_EXCEPTION, {
                        e: a
                    })
                }
            })
        };
        e.pauseListeners = function() {
            var a = this;
            this.eventsToSubscribe.forEach(function(b) {
                document.removeEventListener(b, a.handler)
            });
            window.setTimeout(function() {
                return a.addListeners()
            }, this.pauseTimeout)
        };
        e.collectSignals = function(a) {
            a = a != null;
            a && this.pauseListeners();
            a = new(c("BooleanSignalValueType"))(Date.now(), this.getContext(), a);
            a = {
                signalId: this.signalType,
                data: {
                    valueOrError: a
                }
            };
            window.dispatchEvent(new CustomEvent(d("BDBiometricSignalCollectorBase").BIOMETRIC_SIGNAL_COLLECTED_EVENT_NAME, {
                detail: a
            }))
        };
        return b
    }(d("BDBiometricSignalCollectorBase").BDBiometricSignalCollectorBase);
    g["default"] = a
}), 98);
__d("BDMousePresenceSignalCollector", ["BDTouchOrMouseSignalCollectorBase"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = 60 * 60 * 1e3,
        i = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, k.signalType, ["mousedown", "mousemove"], h) || this
            }
            return a
        }(c("BDTouchOrMouseSignalCollectorBase")),
        j = null,
        k = {
            signalType: 30106,
            get: function() {
                j == null && (j = new i());
                return j
            }
        };
    a = k;
    g["default"] = a
}), 98);
__d("StringSignalValueType", ["SignalValueTypeDef"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b, c, e) {
            return a.call(this, b, c, e, d("SignalValueTypeDef").VALUE_TYPES.STRING) || this
        }
        return b
    }(d("SignalValueTypeDef").SignalValueTypeDef);
    g["default"] = a
}), 98);
__d("BDNavigatorAppVersionSignalCollector", ["BDSignalCollectorBase", "StringSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = navigator.appVersion;
                a = new(c("StringSignalValueType"))(Date.now(), this.getContext(), a);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30013,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNavigatorHardwareConcurrencySignalCollector", ["BDSignalCollectorBase", "NumberSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a;
                a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), (a = navigator.hardwareConcurrency) != null ? a : 0);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30018,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNavigatorMaxTouchPointSignalCollector", ["BDSignalCollectorBase", "NumberSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), navigator.maxTouchPoints);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30093,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNavigatorNotificationPermissionSignalCollector", ["BDSignalCollectorBase", "ErrorSignalValueType", "SignalErrorValueTypeDef", "StringSignalValueType", "regeneratorRuntime"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(e) {
            babelHelpers.inheritsLoose(a, e);

            function a() {
                return e.call(this, j.signalType) || this
            }
            var f = a.prototype;
            f.executeAsyncSignalCollection = function() {
                var a, e;
                return b("regeneratorRuntime").async(function(f) {
                    while (1) switch (f.prev = f.next) {
                        case 0:
                            f.prev = 0;
                            if (!navigator.permissions) {
                                f.next = 8;
                                break
                            }
                            f.next = 4;
                            return b("regeneratorRuntime").awrap(navigator.permissions.query({
                                name: "notifications"
                            }));
                        case 4:
                            e = f.sent;
                            a = new(c("StringSignalValueType"))(Date.now(), this.getContext(), e.state);
                            f.next = 9;
                            break;
                        case 8:
                            a = new(c("ErrorSignalValueType"))(Date.now(), this.getContext(), new(d("SignalErrorValueTypeDef").SignalErrorValueTypeDef)(3, "navigator.permissions not supported"));
                        case 9:
                            f.next = 14;
                            break;
                        case 11:
                            f.prev = 11, f.t0 = f["catch"](0), a = new(c("ErrorSignalValueType"))(Date.now(), this.getContext(), new(d("SignalErrorValueTypeDef").SignalErrorValueTypeDef)(3, "notifications cannot be queried from navigator.permissions"));
                        case 14:
                            return f.abrupt("return", {
                                valueOrError: a
                            });
                        case 15:
                        case "end":
                            return f.stop()
                    }
                }, null, this, [
                    [0, 11]
                ])
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30008,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNavigatorPlatformSignalCollector", ["BDSignalCollectorBase", "StringSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = new(c("StringSignalValueType"))(Date.now(), this.getContext(), navigator.platform);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30015,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNavigatorPluginsFileExtensionsSignalCollector", ["BDSignalCollectorBase", "ErrorSignalValueType", "SignalErrorValueTypeDef", "StringArrayObject"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = 10,
        i = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, k.signalType) || this
            }
            var e = a.prototype;
            e.executeSignalCollection = function() {
                var a = null;
                try {
                    var b = navigator.plugins ? navigator.plugins.length : 0,
                        e = new Set();
                    for (var f = 0; f < b; f++) {
                        var g = navigator.plugins[f].filename;
                        if (!g) continue;
                        var i = g.indexOf(".");
                        if (i == -1 || i == g.length - 1) continue;
                        e.add(g.substr(i + 1));
                        if (e.size >= h) break
                    }
                    e.size && (a = new(c("StringArrayObject"))(Array.from(e)))
                } catch (b) {
                    a = new(c("ErrorSignalValueType"))(Date.now(), this.getContext(), new(d("SignalErrorValueTypeDef").SignalErrorValueTypeDef)(3, "navigator.plugins is not defined"))
                }
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        j = null,
        k = {
            signalType: 30019,
            get: function() {
                j == null && (j = new i());
                return j
            }
        };
    a = k;
    g["default"] = a
}), 98);
__d("BDNavigatorUserAgentSignalCollector", ["BDSignalCollectorBase", "StringSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = new(c("StringSignalValueType"))(Date.now(), this.getContext(), navigator.userAgent);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30094,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNavigatorVendorSignalCollector", ["BDSignalCollectorBase", "StringSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = navigator.vendor;
                a = new(c("StringSignalValueType"))(Date.now(), this.getContext(), a);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30012,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDNotificationPermissionSignalCollector", ["BDSignalCollectorBase", "ErrorSignalValueType", "SignalErrorValueTypeDef", "StringSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var e = a.prototype;
            e.executeSignalCollection = function() {
                var a;
                window.Notification ? a = new(c("StringSignalValueType"))(Date.now(), this.getContext(), Notification.permission) : a = new(c("ErrorSignalValueType"))(Date.now(), this.getContext(), new(d("SignalErrorValueTypeDef").SignalErrorValueTypeDef)(3, "Notification not supported"));
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30007,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDPluginCountSignalCollector", ["BDSignalCollectorBase", "NumberSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = navigator.plugins ? navigator.plugins.length : -1;
                a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), a);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30001,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDTimezoneOffsetSignalCollector", ["BDSignalCollectorBase", "NumberSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a;
                a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), (a = new Date().getTimezoneOffset()) != null ? a : 999);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30040,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDTouchPresenceSignalCollector", ["BDTouchOrMouseSignalCollectorBase"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = 60 * 60 * 1e3,
        i = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, k.signalType, ["touchstart", "touchcancel"], h) || this
            }
            return a
        }(c("BDTouchOrMouseSignalCollectorBase")),
        j = null,
        k = {
            signalType: 30107,
            get: function() {
                j == null && (j = new i());
                return j
            }
        };
    a = k;
    g["default"] = a
}), 98);
__d("BDWebdriverSignalCollector", ["BDSignalCollectorBase", "BooleanSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = !!navigator.webdriver;
                a = new(c("BooleanSignalValueType"))(Date.now(), this.getContext(), a);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 3e4,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDWebglSupportSignalCollector", ["BDSignalCollectorBase", "BooleanSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = document.createElement("canvas"),
                    b = null;
                try {
                    b = a.getContext("webgl") || a.getContext("experimental-webgl")
                } catch (a) {}
                a = Boolean(b);
                b = new(c("BooleanSignalValueType"))(Date.now(), this.getContext(), a);
                return {
                    valueOrError: b
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30022,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDWindowHistoryLengthSignalCollector", ["BDSignalCollectorBase", "NumberSignalValueType"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = new(c("NumberSignalValueType"))(Date.now(), this.getContext(), window.history ? window.history.length : 0);
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30095,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("DimensionObject", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = function() {
        function a(a, b) {
            this.width = null, this.height = null, this.width = a, this.height = b
        }
        var b = a.prototype;
        b.toJSON = function() {
            return {
                w: this.width,
                h: this.height
            }
        };
        b.isEqual = function(b) {
            if (b instanceof a) return this.width === b.width && this.height === b.height;
            else return !1
        };
        return a
    }();
    f["default"] = a
}), 66);
__d("BDWindowOuterDimensionSignalCollector", ["BDSignalCollectorBase", "CustomObjectSignalValueType", "DimensionObject"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = window.innerHeight,
                    b = window.innerWidth;
                b = new(c("CustomObjectSignalValueType"))(Date.now(), this.getContext(), new(c("DimensionObject"))(b, a));
                return {
                    valueOrError: b
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 30005,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("SignalCollectorMap", ["BDConnectionRTTSignalCollector", "BDHeartbeatSignalCollector", "BDHeartbeatV2SignalCollector", "BDKeyDownUpSignalCollector", "BDLanguagesSignalCollector", "BDMimeTypeCountSignalCollector", "BDMousePresenceSignalCollector", "BDNavigatorAppVersionSignalCollector", "BDNavigatorHardwareConcurrencySignalCollector", "BDNavigatorMaxTouchPointSignalCollector", "BDNavigatorNotificationPermissionSignalCollector", "BDNavigatorPlatformSignalCollector", "BDNavigatorPluginsFileExtensionsSignalCollector", "BDNavigatorUserAgentSignalCollector", "BDNavigatorVendorSignalCollector", "BDNotificationPermissionSignalCollector", "BDPluginCountSignalCollector", "BDTimezoneOffsetSignalCollector", "BDTouchPresenceSignalCollector", "BDWebdriverSignalCollector", "BDWebglSupportSignalCollector", "BDWindowHistoryLengthSignalCollector", "BDWindowOuterDimensionSignalCollector"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = {
        get: function(a) {
            switch (a) {
                case 3e4:
                    return c("BDWebdriverSignalCollector").get();
                case 30001:
                    return c("BDPluginCountSignalCollector").get();
                case 30002:
                    return c("BDMimeTypeCountSignalCollector").get();
                case 30003:
                    return c("BDLanguagesSignalCollector").get();
                case 30004:
                    return c("BDConnectionRTTSignalCollector").get();
                case 30005:
                    return c("BDWindowOuterDimensionSignalCollector").get();
                case 30007:
                    return c("BDNotificationPermissionSignalCollector").get();
                case 30008:
                    return c("BDNavigatorNotificationPermissionSignalCollector").get();
                case 30012:
                    return c("BDNavigatorVendorSignalCollector").get();
                case 30013:
                    return c("BDNavigatorAppVersionSignalCollector").get();
                case 30015:
                    return c("BDNavigatorPlatformSignalCollector").get();
                case 30018:
                    return c("BDNavigatorHardwareConcurrencySignalCollector").get();
                case 30019:
                    return c("BDNavigatorPluginsFileExtensionsSignalCollector").get();
                case 30022:
                    return c("BDWebglSupportSignalCollector").get();
                case 30040:
                    return c("BDTimezoneOffsetSignalCollector").get();
                case 30093:
                    return c("BDNavigatorMaxTouchPointSignalCollector").get();
                case 30094:
                    return c("BDNavigatorUserAgentSignalCollector").get();
                case 30095:
                    return c("BDWindowHistoryLengthSignalCollector").get();
                case 30100:
                    return c("BDKeyDownUpSignalCollector").get();
                case 30106:
                    return c("BDMousePresenceSignalCollector").get();
                case 30107:
                    return c("BDTouchPresenceSignalCollector").get();
                case 38e3:
                    return c("BDHeartbeatSignalCollector").get();
                case 38001:
                    return c("BDHeartbeatV2SignalCollector").get()
            }
        }
    };
    b = a;
    g["default"] = b
}), 98);
__d("HeartbeatV2Object", ["HeartbeatObject"], (function(a, b, c, d, e, f, g) {
    "use strict";
    a = function(a) {
        babelHelpers.inheritsLoose(b, a);

        function b(b) {
            var c;
            c = a.call(this) || this;
            c.id = "";
            c.id = b;
            return c
        }
        var c = b.prototype;
        c.toJSON = function() {
            return {
                f: this.isAppForeground,
                id: this.id
            }
        };
        return b
    }(c("HeartbeatObject"));
    g["default"] = a
}), 98);
__d("BDHeartbeatV2SignalCollector", ["BDClientConfig", "BDSignalCollectorBase", "CustomObjectSignalValueType", "HeartbeatV2Object"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = function(b) {
            babelHelpers.inheritsLoose(a, b);

            function a() {
                return b.call(this, j.signalType) || this
            }
            var d = a.prototype;
            d.executeSignalCollection = function() {
                var a = new(c("CustomObjectSignalValueType"))(Date.now(), this.getContext(), new(c("HeartbeatV2Object"))(c("BDClientConfig").get().getHeartbeatVersion()));
                return {
                    valueOrError: a
                }
            };
            return a
        }(c("BDSignalCollectorBase")),
        i = null,
        j = {
            signalType: 38001,
            get: function() {
                i == null && (i = new h());
                return i
            }
        };
    a = j;
    g["default"] = a
}), 98);
__d("BDClientConfig", ["BDLoggingConstants", "BDOperationLogHelper", "BDSignalWrapper"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = "BDClientConfig",
        i = function() {
            function a() {
                this.staticSignalBufferSize = 1, this.dynamicSignalBufferSize = 1, this.biometricSignalBufferSize = 1, this.staticSignals = [], this.dynamicSignals = [], this.biometricSignals = [], this.biometricSignalsMap = new Map(), this.heartbeatSignal = new(c("BDSignalWrapper"))([], 38001), this.bufferSizeBySignalIdMap = {}, this.periodicCollectionIntervalMs = Number.MAX_SAFE_INTEGER, this.signalConfigGenerationTimeStampMs = 0, this.suspiciousTiersFlushDurationMs = Number.MAX_SAFE_INTEGER, this.allTiersFlushDurationMs = Number.MAX_SAFE_INTEGER, this.heartbeatIntervalMs = -1, this.parsingDone = !1, this.sid = -1, this.hbVersion = "", this.bufferSizeBySignalIdMap[38001] = 1
            }
            var b = a.prototype;
            b.setStaticSignalBufferSize = function(a) {
                a > 0 ? this.staticSignalBufferSize = a : d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.INVALID_BUFFER_SIZE, {
                    size: a.toString(),
                    type: "s"
                });
                return this
            };
            b.getStaticSignalBufferSize = function() {
                return this.staticSignalBufferSize
            };
            b.setDynamicSignalBufferSize = function(a) {
                a > 1 ? this.dynamicSignalBufferSize = a : d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.INVALID_BUFFER_SIZE, {
                    size: a.toString(),
                    type: "d"
                });
                return this
            };
            b.getDynamicSignalBufferSize = function() {
                return this.dynamicSignalBufferSize
            };
            b.setBiometricSignalBufferSize = function(a) {
                a > 1 ? this.biometricSignalBufferSize = a : d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.INVALID_BUFFER_SIZE, {
                    size: a.toString(),
                    type: "b"
                });
                return this
            };
            b.setSID = function(a) {
                this.sid = a;
                return this
            };
            b.setHeartbeatVersion = function(a) {
                this.hbVersion = a;
                return this
            };
            b.getHeartbeatVersion = function() {
                return this.hbVersion
            };
            b.getBiometricSignalBufferSize = function() {
                return this.biometricSignalBufferSize
            };
            b.setConfigGenerationTimeStamp = function(a) {
                this.signalConfigGenerationTimeStampMs = a;
                return this
            };
            b.getConfigGenerationTimeStamp = function() {
                return this.signalConfigGenerationTimeStampMs
            };
            b.setHeartbeatIntervalMinutes = function(a) {
                this.heartbeatIntervalMs = a * 60 * 1e3;
                return this
            };
            b.getHeartbeatIntervalMs = function() {
                return this.heartbeatIntervalMs
            };
            b.setSuspiciousTiersFlushDurationMinutes = function(a) {
                a > 0 ? this.suspiciousTiersFlushDurationMs = a * 60 * 1e3 : d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.INVALID_DURATION, {
                    size: a.toString(),
                    type: "fds"
                });
                return this
            };
            b.getSuspiciousTiersFlushDurationMs = function() {
                return this.suspiciousTiersFlushDurationMs
            };
            b.setAllTiersFlushDurationMinutes = function(a) {
                a > 0 ? this.allTiersFlushDurationMs = a * 60 * 1e3 : d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.INVALID_DURATION, {
                    size: a.toString(),
                    type: "fda"
                });
                return this
            };
            b.getAllTiersFlushDurationMs = function() {
                return this.allTiersFlushDurationMs
            };
            b.addMultipleSignalsToClientConfig = function(a) {
                var b = this;
                a.forEach(function(a) {
                    return b.addSignalToClientConfig(a)
                });
                return this
            };
            b.addSignalToClientConfig = function(a) {
                var b = a.getSignalFlags(),
                    d = a.getSignalId();
                if (d === 38e3) return this;
                var e = new(c("BDSignalWrapper"))(b, d);
                if (d === 38001) {
                    this.heartbeatSignal = e;
                    return this
                }!b.includes(2) ? this.staticSignals.push(e) : b.includes(4) ? this.biometricSignals.push(e) : this.dynamicSignals.push(e);
                a.getBufferSize() > 0 && (this.bufferSizeBySignalIdMap[a.getSignalId()] = a.getBufferSize());
                return this
            };
            b.setPeriodicCollectionIntervalSeconds = function(a) {
                a > 0 ? this.periodicCollectionIntervalMs = a * 1e3 : d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.INVALID_DURATION, {
                    size: a.toString(),
                    type: "pi"
                });
                return this
            };
            b.getPeriodicCollectionIntervalMs = function() {
                return this.periodicCollectionIntervalMs
            };
            b.getDynamicSignals = function() {
                return this.dynamicSignals
            };
            b.getStaticSignals = function() {
                return this.staticSignals
            };
            b.getBiometricSignals = function() {
                return this.biometricSignals
            };
            b.getBiometricSignalsMap = function() {
                this.biometricSignalsMap.size === 0 && this.biometricSignals.length > 0 && (this.biometricSignalsMap = this.biometricSignals.reduce(function(a, b) {
                    return a.set(b.signalType, b)
                }, new Map()));
                return this.biometricSignalsMap
            };
            b.getHeartbeatSignal = function() {
                return this.heartbeatSignal
            };
            b.getBufferSizeBySignalId = function(a) {
                return this.bufferSizeBySignalIdMap[a]
            };
            b.setParsingDone = function(a) {
                this.parsingDone = a
            };
            b.isParsingDone = function() {
                return this.parsingDone
            };
            return a
        }(),
        j = null;
    a = {
        get: function() {
            j == null && (j = new i());
            return j
        }
    };
    b = a;
    g["default"] = b
}), 98);
__d("BDCollectionTypeEnum", [], (function(a, b, c, d, e, f) {
    "use strict";
    a = Object.freeze({
        STATIC: 0,
        DYNAMIC: 1,
        BIOMETRIC: 2
    });
    f["default"] = a
}), 66);
__d("BDServerSignalConfig", ["BDLoggingConstants", "BDOperationLogHelper", "BotDetection_SignalFlags"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = "BDServerSignalConfig";
    a = function() {
        function a(a, b, c) {
            this.parsedSignalFlags = [], this.signalId = a, this.signalFlags = b, this.bufferSize = c
        }
        var b = a.prototype;
        b.getSignalId = function() {
            return this.signalId
        };
        b.getSignalFlags = function() {
            var a = this;
            if (this.parsedSignalFlags.length === 0) {
                var b = Object.keys(c("BotDetection_SignalFlags"));
                b.forEach(function(b) {
                    (c("BotDetection_SignalFlags")[b] & a.signalFlags) === c("BotDetection_SignalFlags")[b] && a.parsedSignalFlags.push(c("BotDetection_SignalFlags")[b])
                })
            }
            this.parsedSignalFlags.length === 0 && d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.SIGNAL_FLAGS_MISSING, {
                id: this.signalId.toString(),
                flags: this.signalFlags.toString()
            });
            return this.parsedSignalFlags
        };
        b.getBufferSize = function() {
            return this.bufferSize != null ? this.bufferSize : 0
        };
        return a
    }();
    g["default"] = a
}), 98);
__d("BDServerConfig", ["BDClientConfig", "BDLoggingConstants", "BDOperationLogHelper", "BDServerSignalConfig"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = "BDServerConfig";

    function a(a) {
        var b = [];
        try {
            var e = JSON.parse(a.sc),
                f = new Map(e.c);
            f.forEach(function(a, d) {
                return b.push(new(c("BDServerSignalConfig"))(d, a))
            });
            if (f.size === 0) {
                d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.EMPTY_SIGNAL_CONFIG);
                return
            }
            f = c("BDClientConfig").get();
            f.setPeriodicCollectionIntervalSeconds(a.i).addMultipleSignalsToClientConfig(b).setConfigGenerationTimeStamp(e.t).setAllTiersFlushDurationMinutes(a.fda).setSuspiciousTiersFlushDurationMinutes(a.fds).setHeartbeatIntervalMinutes(a.hbi).setStaticSignalBufferSize(a.sbs).setDynamicSignalBufferSize(a.dbs).setBiometricSignalBufferSize(a.bbs).setSID(a.sid).setHeartbeatVersion(a.hbv).setParsingDone(!0)
        } catch (a) {
            d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.PARSE_CONFIG_ERROR, {
                e: a
            })
        }
    }
    g.parseConfig = a
}), 98);
__d("BDSignalBuffer", ["BDClientConfig", "BDCollectionTypeEnum", "BDLoggingConstants", "BDOperationLogHelper", "BDSignalBufferData"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h = "BDSignalBuffer";

    function a(a, b, d) {
        if (a in c("BDSignalBufferData")) return;
        var e = 1;
        b !== void 0 && (e = b);
        c("BDSignalBufferData")[a] = {
            values: [],
            max_buffer_size: e,
            signal_flags: (b = d) != null ? b : []
        }
    }

    function i(a) {
        if (a in c("BDSignalBufferData")) c("BDSignalBufferData")[a].values = [];
        else throw new Error("Tried to clear signal buffer that was not intialized:")
    }

    function b(a, b) {
        if (a in c("BDSignalBufferData")) {
            var e = c("BDSignalBufferData")[a],
                f = e.max_buffer_size;
            e.values.length >= f && e.values.shift();
            e.values.push(b);
            d("BDOperationLogHelper").logInfo(h, d("BDLoggingConstants").OPERATIONS.APPEND_SIGNAL, {
                id: a.toString()
            })
        } else {
            d("BDOperationLogHelper").logError(h, d("BDLoggingConstants").OPERATIONS.APPEND_SIGNAL_FAIL, {
                id: a.toString()
            });
            throw new Error("Tried to append signal that was not intialized:")
        }
    }

    function e() {
        var a = c("BDClientConfig").get();
        a = a.getBiometricSignals();
        a.forEach(function(a) {
            a.signalType in c("BDSignalBufferData") && i(a.signalType)
        })
    }

    function f(a) {
        var b;
        a = c("BDSignalBufferData")[a];
        b = a == null ? void 0 : (b = a.values) == null ? void 0 : b.length;
        return b != null && b > 0 ? a.values[b - 1] : {
            valueOrError: void 0
        }
    }

    function j(a) {
        return c("BDSignalBufferData")[a].values
    }

    function k(a) {
        var b = {};
        for (var d = 0; d < a.length; d++) {
            var e = a[d];
            e in c("BDSignalBufferData") && (b[e] = j(e).map(function(a) {
                return a.valueOrError
            }))
        }
        return b
    }

    function l(a) {
        a = m(a);
        return JSON.stringify(k(a))
    }

    function m(a) {
        var b = c("BDClientConfig").get(),
            d = [];
        a.forEach(function(a) {
            switch (a) {
                case c("BDCollectionTypeEnum").STATIC:
                    d = [].concat(d, b.getStaticSignals());
                    break;
                case c("BDCollectionTypeEnum").DYNAMIC:
                    d = [].concat(d, b.getDynamicSignals());
                    break;
                case c("BDCollectionTypeEnum").BIOMETRIC:
                    d = [].concat(d, b.getBiometricSignals());
                    break
            }
        });
        return d.map(function(a) {
            return a.signalType
        })
    }
    g.initialize = a;
    g.clearBuffer = i;
    g.appendSignal = b;
    g.clearBiometricSignals = e;
    g.getLastSignalFormatBySignalId = f;
    g.retrieveSignal = j;
    g.retrieveSignals = k;
    g.getSignalsAsJSONString = l;
    g._getSignalIdsByCollectionType = m
}), 98);
__d("BDUtils", [], (function(a, b, c, d, e, f) {
    "use strict";

    function a() {
        return "xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx".replace(/[xy]/g, function(a) {
            var b = Math.random() * 16 | 0;
            a = a == "x" ? b : b & 3 | 8;
            return a.toString(16)
        })
    }
    f.uuid = a
}), 66);
__d("SignalCollectionManager", ["BDBiometricSignalCollectorBase", "BDClientConfig", "BDLoggingConstants", "BDOperationLogHelper", "BDSignalBuffer", "Promise", "regeneratorRuntime"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h, i = "SignalCollectionManager",
        j = function() {
            function a() {
                var a = this;
                this.$1 = !1;
                this.$6 = function(b) {
                    if (b instanceof CustomEvent && b.detail != null && b.detail.data != null) {
                        var d = c("BDClientConfig").get().getBiometricSignalsMap().get(b.detail.signalId);
                        d != null && a.$4(b.detail.data, d)
                    }
                }
            }
            var e = a.prototype;
            e.collectSignals = function(a) {
                var c = this,
                    d;
                return b("regeneratorRuntime").async(function(e) {
                    while (1) switch (e.prev = e.next) {
                        case 0:
                            d = [];
                            a.forEach(function(a) {
                                a.signalFlags.includes(4) ? c.$2(a) : d.push(c.$3(a))
                            });
                            e.next = 4;
                            return b("regeneratorRuntime").awrap((h || (h = b("Promise"))).all(d));
                        case 4:
                        case "end":
                            return e.stop()
                    }
                }, null, this)
            };
            e.isEqualToLastCollectedSignal = function(a, b) {
                var c = d("BDSignalBuffer").getLastSignalFormatBySignalId(b.signalType);
                return c.valueOrError == void 0 ? !1 : a.isEqual(c.valueOrError, new Set(b.signalFlags))
            };
            e.getCircularBufferSize = function(a) {
                var b = c("BDClientConfig").get(),
                    d = b.getBufferSizeBySignalId(a.signalType);
                if (d != null && b.getBufferSizeBySignalId(a.signalType) > 0) return d;
                if (!a.signalFlags.includes(2)) return b.getStaticSignalBufferSize();
                else if (a.signalFlags.includes(4)) return b.getBiometricSignalBufferSize();
                else return b.getDynamicSignalBufferSize()
            };
            e.$3 = function(a) {
                var c, e;
                return b("regeneratorRuntime").async(function(f) {
                    while (1) switch (f.prev = f.next) {
                        case 0:
                            c = a.getSignalCollector();
                            if (!(c != null)) {
                                f.next = 12;
                                break
                            }
                            f.prev = 2;
                            f.next = 5;
                            return b("regeneratorRuntime").awrap(c.executeAsyncSignalCollection());
                        case 5:
                            e = f.sent;
                            this.$4(e, a);
                            f.next = 12;
                            break;
                        case 9:
                            f.prev = 9, f.t0 = f["catch"](2), d("BDOperationLogHelper").logError(i, d("BDLoggingConstants").OPERATIONS.BD_EXCEPTION, {
                                error: f.t0
                            });
                        case 12:
                        case "end":
                            return f.stop()
                    }
                }, null, this, [
                    [2, 9]
                ])
            };
            e.$2 = function(a) {
                this.$5();
                a = a.getSignalCollector();
                a != null && a instanceof d("BDBiometricSignalCollectorBase").BDBiometricSignalCollectorBase && a.listenForSignals()
            };
            e.$5 = function() {
                if (this.$1) return;
                window.addEventListener(d("BDBiometricSignalCollectorBase").BIOMETRIC_SIGNAL_COLLECTED_EVENT_NAME, this.$6);
                this.$1 = !0
            };
            e.$4 = function(a, b) {
                b.getBufferConfig() == null && d("BDSignalBuffer").initialize(b.signalType, this.getCircularBufferSize(b), b.signalFlags), a.valueOrError && !this.isEqualToLastCollectedSignal(a.valueOrError, b) && d("BDSignalBuffer").appendSignal(b.signalType, a)
            };
            return a
        }(),
        k = null;
    a = {
        get: function() {
            k == null && (k = new j());
            return k
        }
    };
    e = a;
    g["default"] = e
}), 98);
__d("BDClientSignalCollectionTrigger", ["BDClientConfig", "BDCollectionTypeEnum", "BDLoggingConstants", "BDOperationLogHelper", "BDServerConfig", "BDSignalBuffer", "BDUtils", "BdPdcSignalsFalcoEvent", "Promise", "SignalCollectionManager", "WebStorage", "javascript-blowfish", "regeneratorRuntime"], (function(a, b, c, d, e, f, g) {
    "use strict";
    var h, i, j = "BDClientSignalCollectionTrigger",
        k = "signal_flush_timestamp",
        l = !1,
        m = !1,
        n = !1,
        o = 0,
        p = 0,
        q = 0,
        r = 30,
        s = 5,
        t, u, v = d("BDUtils").uuid(),
        w = c("BDClientConfig").get(),
        x = Object.freeze({
            NONE: 0,
            VITAL: 1,
            CRITICAL: 2
        }),
        y = {
            startSignalCollection: function(a) {
                return b("regeneratorRuntime").async(function(c) {
                    while (1) switch (c.prev = c.next) {
                        case 0:
                            w.setSID(a.sid);
                            if (l) {
                                c.next = 15;
                                break
                            }
                            l = !0;
                            d("BDServerConfig").parseConfig(a);
                            if (w.isParsingDone()) {
                                c.next = 8;
                                break
                            }
                            d("BDOperationLogHelper").logError(j, d("BDLoggingConstants").OPERATIONS.PARSE_CONFIG_ERROR, {
                                config: JSON.stringify(a)
                            });
                            l = !1;
                            return c.abrupt("return");
                        case 8:
                            a != null && (p = a.hbcbc && a.hbcbc > 0 ? a.hbcbc : p, q = a.hbvbc && a.hbvbc > 0 ? a.hbvbc : q, r = a.hbbi && a.hbbi > 0 ? a.hbbi : r);
                            y.startHeartbeatDelayed();
                            u = new(i || (i = b("Promise")))(function(a, b) {
                                try {
                                    w.getDynamicSignals().length > 0 && (y.collectDynamicSignals(), d("BDOperationLogHelper").logInfo(j, d("BDLoggingConstants").OPERATIONS.DYNAMIC_SIGNAL_COLLECTION_STARTED, {
                                        ts: Date.now().toString()
                                    })), w.getBiometricSignals().length > 0 && (y.collectBiometricSignals(), d("BDOperationLogHelper").logInfo(j, d("BDLoggingConstants").OPERATIONS.BIOMETRIC_SIGNAL_COLLECTION_STARTED, {
                                        ts: Date.now().toString()
                                    })), a()
                                } catch (a) {
                                    b(a)
                                }
                            });
                            c.next = 13;
                            return b("regeneratorRuntime").awrap(u);
                        case 13:
                            c.next = 15;
                            return b("regeneratorRuntime").awrap(y.startSignalPosting());
                        case 15:
                            l && !m && !n && s > 0 && (s -= 1, d("BDOperationLogHelper").logWarning(j, d("BDLoggingConstants").OPERATIONS.TRY_RESTARTING_HB), y.startHeartbeatDelayed());
                        case 16:
                        case "end":
                            return c.stop()
                    }
                }, null, this)
            },
            retrieveSignals: function() {
                return b("regeneratorRuntime").async(function(a) {
                    while (1) switch (a.prev = a.next) {
                        case 0:
                            a.next = 2;
                            return b("regeneratorRuntime").awrap(u);
                        case 2:
                            a.next = 4;
                            return b("regeneratorRuntime").awrap(y.postSignals([c("BDCollectionTypeEnum").DYNAMIC, c("BDCollectionTypeEnum").BIOMETRIC, c("BDCollectionTypeEnum").STATIC]));
                        case 4:
                        case "end":
                            return a.stop()
                    }
                }, null, this)
            },
            postSignals: function(a) {
                return b("regeneratorRuntime").async(function(c) {
                    while (1) switch (c.prev = c.next) {
                        case 0:
                            c.next = 2;
                            return b("regeneratorRuntime").awrap(y.collectStaticSignals());
                        case 2:
                            y._postSignalsHelper(d("BDSignalBuffer").getSignalsAsJSONString(a), x.NONE) && y.setTimestampInStorage(Date.now(), k);
                        case 3:
                        case "end":
                            return c.stop()
                    }
                }, null, this)
            },
            _postSignalsHelper: function(a, b) {
                if (a.length <= 2) return !1;
                var e = w.getConfigGenerationTimeStamp(),
                    f = y.encryptDataUsingAsid(v, a);
                a = function() {
                    return {
                        asid: v,
                        ct: e,
                        sjd: f,
                        sid: w.sid
                    }
                };
                var g = !1;
                try {
                    b === x.CRITICAL ? c("BdPdcSignalsFalcoEvent").logCritical(a) : b === x.VITAL ? c("BdPdcSignalsFalcoEvent").logImmediately(a) : c("BdPdcSignalsFalcoEvent").log(a), g = !0
                } catch (a) {
                    d("BDOperationLogHelper").logError(j, d("BDLoggingConstants").OPERATIONS.BANZAI_LOG_ERROR, a), g = !1
                } finally {
                    return g
                }
            },
            getInitialVector: function(a) {
                if (a.length !== 16) {
                    d("BDOperationLogHelper").logError(j, d("BDLoggingConstants").OPERATIONS.INVALID_LENGTH);
                    return ""
                }
                var b = "";
                for (var c = 0; c < 8; c++) b += String.fromCharCode(a.charCodeAt(c) ^ a.charCodeAt(8 + c));
                return b
            },
            encryptDataUsingAsid: function(a, b) {
                if (a.length !== 36) {
                    d("BDOperationLogHelper").logError(j, d("BDLoggingConstants").OPERATIONS.INVALID_GUID);
                    return b
                }
                a = a.slice(19, 23) + a.slice(24, 36);
                var e = y.getInitialVector(a);
                a = new(c("javascript-blowfish"))(a, "cbc");
                return a.base64Encode(a.encrypt(b, e))
            },
            startSignalPosting: function() {
                var a, c;
                return b("regeneratorRuntime").async(function(d) {
                    while (1) switch (d.prev = d.next) {
                        case 0:
                            a = y.getTimestampInStorage(k);
                            c = Date.now() - a;
                            if (!(c >= w.getAllTiersFlushDurationMs())) {
                                d.next = 7;
                                break
                            }
                            d.next = 5;
                            return b("regeneratorRuntime").awrap(y.postSignalsIntermittently());
                        case 5:
                            d.next = 8;
                            break;
                        case 7:
                            window.setTimeout(function() {
                                y.postSignalsIntermittently()
                            }, w.getAllTiersFlushDurationMs() - c);
                        case 8:
                        case "end":
                            return d.stop()
                    }
                }, null, this)
            },
            postSignalsIntermittently: function() {
                y.postSignals([c("BDCollectionTypeEnum").STATIC]), window.setInterval(function() {
                    y.postSignals([c("BDCollectionTypeEnum").STATIC, c("BDCollectionTypeEnum").DYNAMIC, c("BDCollectionTypeEnum").BIOMETRIC])
                }, w.getAllTiersFlushDurationMs())
            },
            setTimestampInStorage: function(a, b) {
                var e = (h || (h = c("WebStorage"))).getLocalStorage();
                if (!e) {
                    d("BDOperationLogHelper").logWarning(j, d("BDLoggingConstants").OPERATIONS.GET_LOCAL_STORAGE_ERROR);
                    return
                }
                e = h.setItemGuarded(e, b, a.toString());
                e != null && d("BDOperationLogHelper").logWarning(j, d("BDLoggingConstants").OPERATIONS.WEB_STORAGE, {
                    error: e.message
                })
            },
            getTimestampInStorage: function(a) {
                var b = (h || (h = c("WebStorage"))).getLocalStorage();
                if (!b) {
                    d("BDOperationLogHelper").logWarning(j, d("BDLoggingConstants").OPERATIONS.GET_LOCAL_STORAGE_ERROR);
                    return 0
                }
                b = b.getItem(a);
                if (b == null) return 0;
                a = Number.parseInt(b, 10);
                return Number.isFinite(a) ? a : 0
            },
            resetHeartbeatStartedForTest: function() {
                m = !1, n = !1
            },
            startHeartbeatDelayed: function() {
                if (m || n) return;
                var a = y.getTimestampInStorage(y.HEARTBEAT_TIMESTAMP_STORAGE_KEY);
                a = Date.now() - a;
                try {
                    a >= w.getHeartbeatIntervalMs() ? y.startHeartbeat() : (window.setTimeout(function() {
                        return y.startHeartbeat()
                    }, w.getHeartbeatIntervalMs() - a), n = !0)
                } catch (b) {
                    d("BDOperationLogHelper").logError(j, d("BDLoggingConstants").OPERATIONS.HB_START_FAILURE, {
                        lastBeatSince: a.toString(),
                        hbi: w.getHeartbeatIntervalMs().toString(),
                        e: b
                    })
                }
            },
            HEARTBEAT_TIMESTAMP_STORAGE_KEY: "hb_timestamp",
            startHeartbeat: function() {
                !m && w.getHeartbeatIntervalMs() > 0 && (y.collectHeartbeatTimes(p, q), o !== 0 && (window.clearInterval(o), d("BDOperationLogHelper").logWarning(j, d("BDLoggingConstants").OPERATIONS.HB_ALREADY_RUNNING)), o = window.setInterval(function() {
                    return y.collectHeartbeatTimes(p, q)
                }, w.getHeartbeatIntervalMs()), m = !0)
            },
            collectHeartbeatTimes: function(a, b) {
                if (a <= 0 && b <= 0) return;
                a > 0 && y.collectHeartbeat(x.CRITICAL);
                b > 0 && y.collectHeartbeat(x.VITAL);
                (a > 1 || b > 1) && window.setTimeout(function() {
                    return y.collectHeartbeatTimes(a - 1, b - 1)
                }, r * 1e3)
            },
            collectHeartbeat: function(a) {
                var b;
                b = w == null ? void 0 : (b = w.getHeartbeatSignal()) == null ? void 0 : (b = b.getSignalCollector()) == null ? void 0 : b.executeSignalCollection();
                if (b == null) {
                    d("BDOperationLogHelper").logError(j, d("BDLoggingConstants").OPERATIONS.HB_COLLECTION_FAILED, {
                        urgency: a.toString()
                    });
                    return
                } else d("BDOperationLogHelper").logInfo(j, d("BDLoggingConstants").OPERATIONS.HB_COLLECTED, {
                    urgency: a.toString()
                });
                y.postHeartbeat(a, b) && y.setTimestampInStorage(Date.now(), y.HEARTBEAT_TIMESTAMP_STORAGE_KEY)
            },
            postHeartbeat: function(a, b) {
                var c = {};
                c[38001] = [b == null ? void 0 : b.valueOrError];
                b = JSON.stringify(c);
                return y._postSignalsHelper(b, a)
            },
            collectStaticSignals: function() {
                return b("regeneratorRuntime").async(function(a) {
                    while (1) switch (a.prev = a.next) {
                        case 0:
                            a.next = 2;
                            return b("regeneratorRuntime").awrap(y.collectSignalsOneTime(w.getStaticSignals()));
                        case 2:
                        case "end":
                            return a.stop()
                    }
                }, null, this)
            },
            collectDynamicSignals: function() {
                y.stopDynamicSignalCollection(), t = window.setInterval(function() {
                    return b("regeneratorRuntime").async(function(a) {
                        while (1) switch (a.prev = a.next) {
                            case 0:
                                a.next = 2;
                                return b("regeneratorRuntime").awrap(y.collectSignalsOneTime(w.getDynamicSignals()));
                            case 2:
                            case "end":
                                return a.stop()
                        }
                    }, null, this)
                }, w.getPeriodicCollectionIntervalMs())
            },
            collectBiometricSignals: function() {
                y.collectSignalsOneTime(w.getBiometricSignals())
            },
            stopDynamicSignalCollection: function() {
                t != null && (window.clearInterval(t), t = null)
            },
            collectSignalsOneTime: function(a) {
                return b("regeneratorRuntime").async(function(d) {
                    while (1) switch (d.prev = d.next) {
                        case 0:
                            d.next = 2;
                            return b("regeneratorRuntime").awrap(c("SignalCollectionManager").get().collectSignals(a));
                        case 2:
                        case "end":
                            return d.stop()
                    }
                }, null, this)
            }
        };
    a = y;
    g["default"] = a
}), 98);